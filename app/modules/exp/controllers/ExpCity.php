<?php

use App\core\Controller;


use App\modules\exp\dao\mysql\cityDAO;

use App\modules\admin\src\adminServices;
use App\modules\exp\src\expServices;
use App\src\appServices;
use App\src\localeServices;
use App\src\awsServices;

use App\modules\exp\models\mysql\cityModel;


class ExpCity extends Controller
{    
    /**
     * @var string
     */
    protected $saveMode;
    
    /**
     * @var string
     */
    protected $imgDir;

    /**
     * @var string
     */
    protected $imgBucket;
    
    public function __construct()
    {
        parent::__construct();

        $appSrc = new appServices();
		$appSrc->_sessionValidate();

        //
        $this->saveMode = $_ENV['S3BUCKET_STORAGE'] ? "aws-s3" : 'disk';

        if($this->saveMode == "aws-s3"){
            $bucket = $_ENV['S3BUCKET_NAME'];
            $this->imgBucket = "https://{$bucket}.s3.amazonaws.com/exp/city/";
            $this->imgDir = "exp/city/";
        }else{
            if($_ENV['EXTERNAL_STORAGE']) {
                $modDir = $appSrc->_setFolder($_ENV['EXTERNAL_STORAGE_PATH'].'/exp/');
                $this->imgDir = $appSrc->_setFolder($modDir.'city/');
                $this->imgBucket = $_ENV['EXTERNAL_STORAGE_URL'].'exp/city/';
            } else {
                $storageDir = $appSrc->_setFolder($appSrc->_getHelpdezkPath().'/storage/');
                $upDir = $appSrc->_setFolder($storageDir.'uploads/');
                $modDir = $appSrc->_setFolder($upDir.'exp/');
                $this->imgDir = $appSrc->_setFolder($modDir.'city/');
                $this->imgBucket = $_ENV['HDK_URL']."/storage/uploads/exp/city/";
            }
        }
        
    }

    /**
     * en_us Renders the holidays home screen template
     *
     * pt_br Renderiza o template da tela de home de feriados
     */
    public function index()
    {
        $params = $this->makeScreenCity();
		
		$this->view('exp','city',$params);
    }

    /**
     * en_us Configure program screens
	 * 
	 * pt_br Configura as telas do programa
     *
     * @param  string $option Indicates the type of screen (idx = index, add = new, upd = update)
     * @param  mixed $obj
     * @return void
     */
    public function makeScreenCity($option='idx',$obj=null)
    {
        $appSrc = new appServices();
        $adminSrc = new adminServices();
        $expSrc = new expServices();
        $translator = new localeServices();
        $params = $appSrc->_getDefaultParams();
        $params = $expSrc->_makeNavExp($params);

        // -- States --
        $params['cmbStates'] = $adminSrc->_comboStates();
       
        // -- Datepicker settings -- 
        $retDtpicker = $appSrc->_datepickerSettings();
        $params['dtpFormat'] = $retDtpicker['dtpFormat'];
        $params['dtpLanguage'] = $retDtpicker['dtpLanguage'];
        $params['dtpAutoclose'] = $retDtpicker['dtpAutoclose'];
        $params['dtpOrientation'] = $retDtpicker['dtpOrientation'];
        $params['dtpickerLocale'] = $retDtpicker['dtpickerLocale'];
        $params['dtSearchFmt'] = $retDtpicker['dtSearchFmt'];
        
        // -- Search action --
        if($option=='idx'){
            $params['cmbFilterOpts'] = $appSrc->_comboFilterOpts();
            $params['cmbFilters'] = $this->comboCityFilters();
            $params['modalFilters'] = $appSrc->_getHelpdezkPath().'/app/modules/main/views/modals/main/modal-search-filters.latte';
        }
        
        // -- Others modals --
        $params['modalAlert'] = $appSrc->_getHelpdezkPath().'/app/modules/main/views/modals/main/modal-alert.latte';
        $params['modalNextStep'] = $appSrc->_getHelpdezkPath().'/app/modules/main/views/modals/main/modal-next-step.latte';
        
        // -- Token: to prevent attacks --
        $params['token'] = $appSrc->_makeToken();

        if($option=='upd'){
            $params['cityID'] = $obj->getIdcity();
            $params['stateID'] = $obj->getIdstate();
            $params['cityName'] = $obj->getName();
            $params['foundationDate'] = $appSrc->_formatDate($obj->getDtfoundation());
            $params['isDefault'] = $obj->getIsdefault();
        }
        
        return $params;
    }
    
    /**
     * en_us Returns cities data to grid
	 * 
	 * pt_br Retorna os dados das cidades para o grid
     *
     * @return void
     */
    public function jsonGrid()
    {
        $appSrc = new appServices();
        $translator = new localeServices();
        $cityDao = new cityDAO(); 

        $where = "";

        //Search with params sended from filter's modal
        $filterValue ="";
        if(isset($_POST["filterIndx"]) && isset($_POST["filterValue"]) )
        {
            $filterIndx = $_POST["filterIndx"];
            $filterValue = $_POST["filterValue"];
            $filterOp = $_POST["filterOperation"];

            switch($filterIndx){
                case "city_uf": //Search for the acronym or the full name of the state
                    $where .= "AND (" . $appSrc->_formatGridOperation($filterOp,"b.name",$filterValue) ." OR ". $appSrc->_formatGridOperation($filterOp,"b.abbr",$filterValue) . ")" ;
                    break;
                case "dtfoundation": //Search for city's foundation date
                    $filterValue = $appSrc->_formatSaveDate($filterValue);
                    $where .= "AND " . $appSrc->_formatGridOperation($filterOp,$filterIndx,$filterValue);
                    break;
                default: //Search fro city's name
                    $filterIndx = "a.name";
                    $where .= "AND " . $appSrc->_formatGridOperation($filterOp,$filterIndx,$filterValue);
                    break;
            }
            
            
        } 
        
        //Search with params sended from quick search input
        if(isset($_POST["quickSearch"]) && $_POST["quickSearch"])
        {
            $quickValue = trim($_POST['quickValue']);
            if(strtotime($quickValue)){//Search for city's foundation date
                $where .= " AND dtfoundation '".$appSrc->_formatSaveDate($quickValue)."'";// it's in date format
            }else{//Search fro city's name
                $quickValue = str_replace(" ","%",$quickValue);
                $where .= " AND a.name LIKE '%{$quickValue}%'";
            }
        }
        
        //sort options
        $pq_sort = json_decode($_POST['pq_sort']);
        $sortIndx = $pq_sort[0]->dataIndx;
        
        $sortDir = (isset($pq_sort[0]->dir) && $pq_sort[0]->dir =="up") ? "ASC" : "DESC";
        $order = "ORDER BY {$sortIndx} {$sortDir}";
        
        $pq_curPage = !isset($_POST["pq_curpage"]) ? 1 : $_POST["pq_curpage"];    
    
        $pq_rPP = $_POST["pq_rpp"];
        
        //Count records
        $countCities = $cityDao->queryCities($where); 
        if($countCities['status']){
            $countObj = $countCities['push']['object']->getGridList();
            $total_Records = count($countObj);
        }else{
            $total_Records = 0;
        }
        
        $skip = $appSrc->_pageHelper($pq_curPage, $pq_rPP, $total_Records);
        $limit = "LIMIT {$skip},$pq_rPP";

        $cities = $cityDao->queryCities($where,$group,$order,$limit);
        
        if($cities['status']){     
            $citiesObj = $cities['push']['object']->getGridList();     
            
            foreach($citiesObj as $k=>$v) {
                $status_fmt = ($v['status'] == 'A' ) ? '<span class="label label-info">A</span>' : '<span class="label label-danger">I</span>';
                $default_fmt = ($v['default'] == 1 ) ? '<span class="label label-info">&check;</span>' : '';

                $data[] = array(
                    'idcity'        => $v['idcity'],
                    'city'          => $v['city'],//utf8_decode($v['holiday_description']),
                    'uf'            => $v['uf'],
                    'dtfoundation'  => $appSrc->_formatDate($v['dtfoundation']),
                    'status'        => $status_fmt,
                    'status_val'    => $v['status'],
                    'default'       => $default_fmt,
                    'default_val'   => $v['default']
    
                );
            }
            $aRet = array(
                "totalRecords" => $total_Records,
                "curPage" => $pq_curPage,
                "data" => $data
            );

            echo json_encode($aRet);
            
        }else{
            echo json_encode(array());            
        }
    }

    /**
     * Returns an array with ID and name of filters
     *
     * @return array
     */
    public function comboCityFilters(): array
    {
        $translator = new localeServices();

        $aRet = array(
            array("id" => 'city_name',"text"=>$translator->translate('Name')), // equal
            array("id" => 'city_uf',"text"=>$translator->translate('uf')),
            array("id" => 'dtfoundation',"text"=>$translator->translate('city_foundation'))
        );
        
        return $aRet;
    }

    /**
     * en_us Renders the city add screen
     *
     * pt_br Renderiza o template da tela de novo cadastro
     */
    public function formCreate()
    {
        $params = $this->makeScreenCity();
        
        $this->view('exp','city-create',$params);
    }

    /**
     * en_us Renders the city update screen
     *
     * pt_br Renderiza o template da tela de atualização do cadastro
     */
    public function formUpdate($idcity=null)
    {
        $cityDao = new cityDAO(); 
        $cityUpd = $cityDao->getcity($idcity);

        $params = $this->makeScreenCity('upd',$cityUpd);
        $params['cityID'] = $idcity;
      
        $this->view('exp','city-update',$params);
    }

    /**
     * en_us Write the city information to the DB
     *
     * pt_br Grava no BD as informações da cidade
     */
    public function createCity()
    {
        $appSrc = new appServices();
        $translator = new localeServices();
        
        if (!$appSrc->_checkToken()) {
            $this->logger->error("Error Token - User: {$_SESSION['SES_LOGIN_PERSON']}", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
            return false;
        }        
        
        $cityDao = new cityDAO();
        $cityMod = new cityModel();

        

        //Setting up the model
        $cityMod->setIdstate($_POST['cmbUF'])
                ->setName(trim($_POST['cityName']))
                ->setDtfoundation($appSrc->_formatSaveDate($_POST['foundationDate']))
                ->setIsdefault($_POST['cityDefault']);        

        if(isset($_POST["attachments"])){
            $aAttachs = $_POST["attachments"]; // Attachments
            $aSize = count($aAttachs); // count attachs files
            
            $cityMod->setAttachments($aAttachs);
        }
                
        
        $ins = $cityDao->insertCity($cityMod);
        if($ins['status']){
            $st = true;
            $msg = "";
            $cityID = $ins['push']['object']->getIdcity();
            $cityDescription = $ins['push']['object']->getName();
            $cityFoundation = $appSrc->_formatDate($ins['push']['object']->getDtfoundation());
            
            // link attachments to the city
            if($aSize > 0){
                $insAttachs = $this->linkCityAttachments($cityMod);
                
                if(!$insAttachs['success']){
                    $this->logger->error("{$insAttachs['message']}", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
                    $st = false;
                    $msg = $insAttachs['message'];
                    $cityID = "";
                    $cityDescription = "";
                    $cityFoundation = "";
                }
            }
        }else{
            $st = false;
            $msg = $ins['push']['message'];
            $cityID = "";
            $cityDescription = "";
            $cityFoundation = "";
        }       
        
        $aRet = array(
            "success" => $st,
            "message" => $msg,
            "idcity" => $cityID,
            "description" => $cityDescription,
            "dtfoundation"  => $cityFoundation
        );       

        echo json_encode($aRet);
    }

    /**
     * en_us Update the city information to the DB
     *
     * pt_br Atualiza no BD as informações da cidade
     */
    public function updateCity()
    { 
        $appSrc = new appServices();
        $translator = new localeServices();
        
        if (!$appSrc->_checkToken()) {
            $this->logger->error("Error Token - User: {$_SESSION['SES_LOGIN_PERSON']}", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
            return false;
        }
        
        $cityDao = new cityDAO();
        
        $cityID = $_POST['cityID'];
        $uf = $_POST['cmbUF'];
        $name = trim($_POST['cityName']);
        $dtFoundation = $appSrc->_formatSaveDate($_POST['foundationDate']);        
        $flgDefault = $_POST['cityDefault'];
        $aAttachs 	= $_POST["attachments"]; // Attachments
        $aSize = count($aAttachs); // count attachs files
        
        $upd = $cityDao->updateCity($cityID,$uf,$name,$dtFoundation,$flgDefault);
        if(is_null($upd) || empty($upd)){
            return false;
        }        
        
        // link attachments to the city
        if($aSize > 0){
            $insAttachs = $this->linkCityAttachments($cityID,$aAttachs);
            
            if(!$insAttachs['success']){
                $this->logger->error("{$insAttachs['message']}", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
                return false;
            }
        }        
        
        $aRet = array(
            "success" => true,
            "idcity" => $cityID
        );        

        echo json_encode($aRet);
    }

    /**
     * en_us Changes city's status
     *
     * pt_br Muda o status da cidade
     */
    function changeStatus()
    {
        $appSrc = new appServices();        
        if (!$appSrc->_checkToken()) {
            $this->logger->error("Error Token - User: {$_SESSION['SES_LOGIN_PERSON']}", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
            return false;
        }

        $cityDao = new cityDAO();
        $cityID = $_POST['cityID'];
        $newStatus = $_POST['newstatus'];
        
        $upd = $cityDao->updateStatus($cityID,$newStatus);
        if(is_null($upd)){
            return false;
        }

        $aRet = array(
            "success" => true
        );

        echo json_encode($aRet);

    }

    /**
     * en_us Remove the city from the DB
     *
     * pt_br Remove a cidade do BD
     */
    function deleteCity()
    {
        $appSrc = new appServices();        
        if (!$appSrc->_checkToken()) {
            $this->logger->error("Error Token - User: {$_SESSION['SES_LOGIN_PERSON']}", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
            return false;
        }

        $cityDao = new cityDAO();

        $id = $_POST['cityID'];
        
        $del = $cityDao->deleteCity($id);
		if(is_null($del) || empty($del)){
            return false;
        }

        $aRet = array(
            "success" => true
        );

        echo json_encode($aRet);

    }

    /**
     * en_us Check if the city has already been registered before
     *
     * pt_br Verifica se a cidade já foi cadastrada anteriormente
     */
    function checkExist(){
        
        $appSrc = new appServices();
        $translator = new localeServices();
        
        if (!$appSrc->_checkToken()) {
            $this->logger->error("Error Token - User: {$_SESSION['SES_LOGIN_PERSON']}", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
            return false;
        }
        
        $cityDao = new cityDAO();

        $stateID = $_POST['uf'];
        $name = strip_tags($_POST['cityName']);

        $where = "AND a.name = '$name' AND a.idstate = $stateID";
        $where .= (isset($_POST['idcity'])) ? "AND idcity != {$_POST['idcity']}" : "";

        $check =  $cityDao->queryCities($where);
        if(!$check['status']){
            return false;
        }

        $checkObj = $check['push']['object']->getGridList();
        
        if(count($checkObj) > 0){
            echo json_encode($translator->translate('city_already_registered'));
        }else{
            echo json_encode(true);
        }

    }

    /**
     * en_us Uploads the file in the directory
     *
     * pt_br Carrega o arquivo no diretório
     */
    function saveImage()
    {
        $translator = new localeServices();
        
        if (!empty($_FILES) && ($_FILES['file']['error'] == 0)) {

            $fileName = $_FILES['file']['name'];
            $tempFile = $_FILES['file']['tmp_name'];
            $extension = strrchr($fileName, ".");

            if($this->saveMode == 'disk') {
                $targetFile =  $this->imgDir.$fileName;
    
                if (move_uploaded_file($tempFile,$targetFile)){
                    $this->logger->info("City's image saved", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
                    echo json_encode(array("success"=>true,"message"=>""));
                } else {
                    $this->logger->error("Error trying save city image: {$fileName}.", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
                    echo json_encode(array("success"=>false,"message"=>"{$translator->translate('Alert_failure')}"));
                }
                    
            }elseif($this->saveMode == "aws-s3"){
                
                $aws = new awsServices();
                
                $arrayRet = $aws->_copyToBucket($tempFile,$this->imgDir.$fileName);
                
                if($arrayRet['success']) {
                    $this->logger->info("Save temp attachment file {$fileName}", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);

                    echo json_encode(array("success"=>true,"message"=>""));     
                } else {
                    $this->logger->error("I could not save the temp file: {$fileName} in S3 bucket !!", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
                    echo json_encode(array("success"=>false,"message"=>"{$translator->translate('Alert_failure')}"));
                }             

            }

        }else{
            echo json_encode(array("success"=>false,"message"=>"{$translator->translate('Alert_failure')}"));
        }

        exit;
    }

    /**
     * en_us Loads the file linked with the city in the dropzone of the update screen
     *
     * pt_br Carrega o arquivo vinculado à cidade no dropzone da tela de atualização
     */
    function loadImage()
    {
        $appSrc = new appServices();
        $translator = new localeServices();        
        $cityDao = new cityDAO();

        $cityID = $_POST['cityID'];
        $imgList = $cityDao->fetchCityImage($cityID);

        if (is_null($imgList)) {
            return false;
        }

        $aImage = [];

        if(!empty($imgList)){
            foreach ($imgList as $key => $value){
                if($this->saveMode == "aws-s3"){
                    $size = strlen(file_get_contents($this->imgBucket.$value['name']));
                }else{
                    $size = filesize($this->imgDir.$value['name']);
                }            
                
                $aImage[] = array(
                    'idimage'   => $value['idimage'],
                    'idcity'    => $value['idcity'], 
                    'filename'      => $value['filename'],
                    'fmtname'   => $value['fileuploaded'],
                    'size'      => $size,
                    'url'       => $this->imgBucket
                );
            }
        }
        
        echo json_encode($aImage);
    }

    /**
     * en_us Removes the file linked with the city
     *
     * pt_br Deleta o arquivo vinculado à cidade
     */
    function removeImage()
    {
        $appSrc = new appServices();
        $translator = new localeServices();        
        $cityDao = new cityDAO();

        $idimage = $_POST['idimage'];
        $filename = $_POST['filename'];

        $del = $cityDao->deleteCityImage($idimage);
        if (is_null($del)) {
            return false;
        }

        if($this->saveMode == 'disk') {
            unlink($this->imgDir.$filename);
            $msg = true;
        }else if ($this->saveMode == 'aws-s3'){           
            $aws = $this->getAwsS3Client();
            $arrayRet = $aws->removeFile("{$this->imgDir}{$filename}");
            if($arrayRet['success']) {
                $msg = true;
            } else {
                $this->logger->error("I could not remove the image file: {$filename} from S3 bucket !!", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
                $msg = false;
            }
        }

        $aRet = array(
            "success" => $msg,
        );

        echo json_encode($aRet);
    }
    
    /**
     * Link City to uploaded files
     *
     * @param  cityModel $cityModel
     * @return array
     */
    public function linkCityAttachments(cityModel $cityModel): array
    {
        $appSrc = new appServices();
        $translator = new localeServices();
        
        $cityDao = new cityDAO();
        $aAttachs = $cityModel->getAttachments();
        
        foreach($aAttachs as $key=>$fileName){
            $cityModel->setFilename($fileName);

            $ins = $cityDao->insertCityImage($cityModel);

            if(!$ins['status']) {
                return array("success"=>false,"message"=>"Can't link file {$fileName} to city # {$cityModel->getIdcity()}");
            }

            $extension = strrchr($fileName, ".");
            $imageID = $ins['status']->getIdimage();
            $newFile = $imageID.$extension;

            if($this->saveMode == 'disk') {
                $targetOld = $this->imgDir.$fileName;
                $targetNew =  $this->imgDir.$newFile;
                if(!rename($targetOld,$targetNew)){
                    $del = $cityDao->deleteCityImage($imageID);
                    if(is_null($del)) {
                        return array("success"=>false,"message"=>"Can't link file {$fileName} to city # {$cityID}");
                    }
                    return array("success"=>false,"message"=>"Can't link file {$fileName} to city #{$productID}");
                }
                
            }elseif($this->saveMode == 'aws-s3') {
                $aws = new awsServices();
                $arrayRet = $aws->_renameFile("{$this->imgDir}{$fileName}","{$this->imgDir}{$newFile}");
                
                if($arrayRet['success']) {
                    $this->logger->info("Rename city image file {$fileName} to {$newFile}", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
                } else {
                    $this->logger->error("I could not rename city image file {$fileName} to {$newFile} in S3 bucket !!", ['Class' => __CLASS__,'Method' => __METHOD__,'Line' => __LINE__]);
                    return json_encode(array("success"=>false,"message"=>"{$translator->translate('Alert_failure')}"));
                }
            
            }

            $upd = $cityDao->updateCityImageName($imageID,$newFile);
            if (is_null($upd)) {
                return array("success"=>false,"message"=>"Can't update link file {$fileName} to city {$cityID}");
            }

        }

        return array("success"=>true,"message"=>"");

    }


}