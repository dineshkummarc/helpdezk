<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit111e31b77f46e2376ddd8177155aae62
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
        'b067bc7112e384b61c701452d53a14a8' => __DIR__ . '/..' . '/mtdowling/jmespath.php/src/JmesPath.php',
        '8a9dc1de0ca7e01f3e08231539562f61' => __DIR__ . '/..' . '/aws/aws-sdk-php/src/functions.php',
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '6124b4c8570aa390c21fafd04a26c69f' => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy/deep_copy.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'setasign\\Fpdi\\' => 14,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
            'PhpOption\\' => 10,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Mpdf\\' => 5,
            'Monolog\\' => 8,
        ),
        'J' => 
        array (
            'JmesPath\\' => 9,
        ),
        'H' => 
        array (
            'Http\\Message\\' => 13,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
            'DeepCopy\\' => 9,
        ),
        'A' => 
        array (
            'Aws\\' => 4,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'setasign\\Fpdi\\' => 
        array (
            0 => __DIR__ . '/..' . '/setasign/fpdi/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-factory/src',
            1 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Mpdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/mpdf/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'JmesPath\\' => 
        array (
            0 => __DIR__ . '/..' . '/mtdowling/jmespath.php/src',
        ),
        'Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-http/message-factory/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'DeepCopy\\' => 
        array (
            0 => __DIR__ . '/..' . '/myclabs/deep-copy/src/DeepCopy',
        ),
        'Aws\\' => 
        array (
            0 => __DIR__ . '/..' . '/aws/aws-sdk-php/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'AWS\\CRT\\Auth\\AwsCredentials' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/AwsCredentials.php',
        'AWS\\CRT\\Auth\\CredentialsProvider' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/CredentialsProvider.php',
        'AWS\\CRT\\Auth\\Signable' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/Signable.php',
        'AWS\\CRT\\Auth\\SignatureType' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/SignatureType.php',
        'AWS\\CRT\\Auth\\SignedBodyHeaderType' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/SignedBodyHeaderType.php',
        'AWS\\CRT\\Auth\\Signing' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/Signing.php',
        'AWS\\CRT\\Auth\\SigningAlgorithm' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/SigningAlgorithm.php',
        'AWS\\CRT\\Auth\\SigningConfigAWS' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/SigningConfigAWS.php',
        'AWS\\CRT\\Auth\\SigningResult' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/SigningResult.php',
        'AWS\\CRT\\Auth\\StaticCredentialsProvider' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Auth/StaticCredentialsProvider.php',
        'AWS\\CRT\\CRT' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/CRT.php',
        'AWS\\CRT\\HTTP\\Headers' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/HTTP/Headers.php',
        'AWS\\CRT\\HTTP\\Message' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/HTTP/Message.php',
        'AWS\\CRT\\HTTP\\Request' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/HTTP/Request.php',
        'AWS\\CRT\\HTTP\\Response' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/HTTP/Response.php',
        'AWS\\CRT\\IO\\EventLoopGroup' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/IO/EventLoopGroup.php',
        'AWS\\CRT\\IO\\InputStream' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/IO/InputStream.php',
        'AWS\\CRT\\Internal\\Encoding' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Internal/Encoding.php',
        'AWS\\CRT\\Internal\\Extension' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Internal/Extension.php',
        'AWS\\CRT\\Log' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Log.php',
        'AWS\\CRT\\NativeResource' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/NativeResource.php',
        'AWS\\CRT\\OptionValue' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Options.php',
        'AWS\\CRT\\Options' => __DIR__ . '/..' . '/aws/aws-crt-php/src/AWS/CRT/Options.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Latte\\Attributes\\TemplateFilter' => __DIR__ . '/..' . '/latte/latte/src/Latte/attributes.php',
        'Latte\\Attributes\\TemplateFunction' => __DIR__ . '/..' . '/latte/latte/src/Latte/attributes.php',
        'Latte\\Bridges\\Tracy\\BlueScreenPanel' => __DIR__ . '/..' . '/latte/latte/src/Bridges/Tracy/BlueScreenPanel.php',
        'Latte\\Bridges\\Tracy\\LattePanel' => __DIR__ . '/..' . '/latte/latte/src/Bridges/Tracy/LattePanel.php',
        'Latte\\CompileException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Compiler' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Compiler.php',
        'Latte\\Engine' => __DIR__ . '/..' . '/latte/latte/src/Latte/Engine.php',
        'Latte\\Helpers' => __DIR__ . '/..' . '/latte/latte/src/Latte/Helpers.php',
        'Latte\\HtmlNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/HtmlNode.php',
        'Latte\\ILoader' => __DIR__ . '/..' . '/latte/latte/src/compatibility.php',
        'Latte\\IMacro' => __DIR__ . '/..' . '/latte/latte/src/compatibility.php',
        'Latte\\Loader' => __DIR__ . '/..' . '/latte/latte/src/Latte/Loader.php',
        'Latte\\Loaders\\FileLoader' => __DIR__ . '/..' . '/latte/latte/src/Latte/Loaders/FileLoader.php',
        'Latte\\Loaders\\StringLoader' => __DIR__ . '/..' . '/latte/latte/src/Latte/Loaders/StringLoader.php',
        'Latte\\Macro' => __DIR__ . '/..' . '/latte/latte/src/Latte/Macro.php',
        'Latte\\MacroNode' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/MacroNode.php',
        'Latte\\MacroTokens' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/MacroTokens.php',
        'Latte\\Macros\\BlockMacros' => __DIR__ . '/..' . '/latte/latte/src/Latte/Macros/BlockMacros.php',
        'Latte\\Macros\\CoreMacros' => __DIR__ . '/..' . '/latte/latte/src/Latte/Macros/CoreMacros.php',
        'Latte\\Macros\\MacroSet' => __DIR__ . '/..' . '/latte/latte/src/Latte/Macros/MacroSet.php',
        'Latte\\Parser' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Parser.php',
        'Latte\\PhpHelpers' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/PhpHelpers.php',
        'Latte\\PhpWriter' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/PhpWriter.php',
        'Latte\\Policy' => __DIR__ . '/..' . '/latte/latte/src/Latte/Policy.php',
        'Latte\\RegexpException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\RuntimeException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Runtime\\Block' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Block.php',
        'Latte\\Runtime\\Blueprint' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Blueprint.php',
        'Latte\\Runtime\\CachingIterator' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/CachingIterator.php',
        'Latte\\Runtime\\Defaults' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Defaults.php',
        'Latte\\Runtime\\FilterExecutor' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/FilterExecutor.php',
        'Latte\\Runtime\\FilterInfo' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/FilterInfo.php',
        'Latte\\Runtime\\Filters' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Filters.php',
        'Latte\\Runtime\\Html' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Html.php',
        'Latte\\Runtime\\HtmlStringable' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/HtmlStringable.php',
        'Latte\\Runtime\\IHtmlString' => __DIR__ . '/..' . '/latte/latte/src/compatibility.php',
        'Latte\\Runtime\\ISnippetBridge' => __DIR__ . '/..' . '/latte/latte/src/compatibility.php',
        'Latte\\Runtime\\RollbackException' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/RollbackException.php',
        'Latte\\Runtime\\SnippetBridge' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/SnippetBridge.php',
        'Latte\\Runtime\\SnippetDriver' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/SnippetDriver.php',
        'Latte\\Runtime\\Template' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Template.php',
        'Latte\\Runtime\\Tracer' => __DIR__ . '/..' . '/latte/latte/src/Latte/Runtime/Tracer.php',
        'Latte\\Sandbox\\SecurityPolicy' => __DIR__ . '/..' . '/latte/latte/src/Latte/Sandbox/SecurityPolicy.php',
        'Latte\\SecurityViolationException' => __DIR__ . '/..' . '/latte/latte/src/Latte/exceptions.php',
        'Latte\\Strict' => __DIR__ . '/..' . '/latte/latte/src/Latte/Strict.php',
        'Latte\\Token' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Token.php',
        'Latte\\TokenIterator' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/TokenIterator.php',
        'Latte\\Tokenizer' => __DIR__ . '/..' . '/latte/latte/src/Latte/Compiler/Tokenizer.php',
        'Nette\\ArgumentOutOfRangeException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\DeprecatedException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\DirectoryNotFoundException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\FileNotFoundException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\HtmlStringable' => __DIR__ . '/..' . '/nette/utils/src/HtmlStringable.php',
        'Nette\\IOException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\InvalidArgumentException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\InvalidStateException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\Iterators\\CachingIterator' => __DIR__ . '/..' . '/nette/utils/src/Iterators/CachingIterator.php',
        'Nette\\Iterators\\Mapper' => __DIR__ . '/..' . '/nette/utils/src/Iterators/Mapper.php',
        'Nette\\Localization\\ITranslator' => __DIR__ . '/..' . '/nette/utils/src/compatibility.php',
        'Nette\\Localization\\Translator' => __DIR__ . '/..' . '/nette/utils/src/Translator.php',
        'Nette\\MemberAccessException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\NotImplementedException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\NotSupportedException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\OutOfRangeException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\SmartObject' => __DIR__ . '/..' . '/nette/utils/src/SmartObject.php',
        'Nette\\StaticClass' => __DIR__ . '/..' . '/nette/utils/src/StaticClass.php',
        'Nette\\UnexpectedValueException' => __DIR__ . '/..' . '/nette/utils/src/exceptions.php',
        'Nette\\Utils\\ArrayHash' => __DIR__ . '/..' . '/nette/utils/src/Utils/ArrayHash.php',
        'Nette\\Utils\\ArrayList' => __DIR__ . '/..' . '/nette/utils/src/Utils/ArrayList.php',
        'Nette\\Utils\\Arrays' => __DIR__ . '/..' . '/nette/utils/src/Utils/Arrays.php',
        'Nette\\Utils\\AssertionException' => __DIR__ . '/..' . '/nette/utils/src/Utils/exceptions.php',
        'Nette\\Utils\\Callback' => __DIR__ . '/..' . '/nette/utils/src/Utils/Callback.php',
        'Nette\\Utils\\DateTime' => __DIR__ . '/..' . '/nette/utils/src/Utils/DateTime.php',
        'Nette\\Utils\\FileSystem' => __DIR__ . '/..' . '/nette/utils/src/Utils/FileSystem.php',
        'Nette\\Utils\\Floats' => __DIR__ . '/..' . '/nette/utils/src/Utils/Floats.php',
        'Nette\\Utils\\Helpers' => __DIR__ . '/..' . '/nette/utils/src/Utils/Helpers.php',
        'Nette\\Utils\\Html' => __DIR__ . '/..' . '/nette/utils/src/Utils/Html.php',
        'Nette\\Utils\\IHtmlString' => __DIR__ . '/..' . '/nette/utils/src/compatibility.php',
        'Nette\\Utils\\Image' => __DIR__ . '/..' . '/nette/utils/src/Utils/Image.php',
        'Nette\\Utils\\ImageException' => __DIR__ . '/..' . '/nette/utils/src/Utils/exceptions.php',
        'Nette\\Utils\\Json' => __DIR__ . '/..' . '/nette/utils/src/Utils/Json.php',
        'Nette\\Utils\\JsonException' => __DIR__ . '/..' . '/nette/utils/src/Utils/exceptions.php',
        'Nette\\Utils\\ObjectHelpers' => __DIR__ . '/..' . '/nette/utils/src/Utils/ObjectHelpers.php',
        'Nette\\Utils\\ObjectMixin' => __DIR__ . '/..' . '/nette/utils/src/Utils/ObjectMixin.php',
        'Nette\\Utils\\Paginator' => __DIR__ . '/..' . '/nette/utils/src/Utils/Paginator.php',
        'Nette\\Utils\\Random' => __DIR__ . '/..' . '/nette/utils/src/Utils/Random.php',
        'Nette\\Utils\\Reflection' => __DIR__ . '/..' . '/nette/utils/src/Utils/Reflection.php',
        'Nette\\Utils\\RegexpException' => __DIR__ . '/..' . '/nette/utils/src/Utils/exceptions.php',
        'Nette\\Utils\\Strings' => __DIR__ . '/..' . '/nette/utils/src/Utils/Strings.php',
        'Nette\\Utils\\Type' => __DIR__ . '/..' . '/nette/utils/src/Utils/Type.php',
        'Nette\\Utils\\UnknownImageFileException' => __DIR__ . '/..' . '/nette/utils/src/Utils/exceptions.php',
        'Nette\\Utils\\Validators' => __DIR__ . '/..' . '/nette/utils/src/Utils/Validators.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit111e31b77f46e2376ddd8177155aae62::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit111e31b77f46e2376ddd8177155aae62::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit111e31b77f46e2376ddd8177155aae62::$classMap;

        }, null, ClassLoader::class);
    }
}
