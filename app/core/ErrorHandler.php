<?php
class ErrorHandler {
    public static function initialize() {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        set_error_handler([self::class, 'handleError']);
        set_exception_handler([self::class, 'handleException']);
    }

    public static function handleError($errno, $errstr, $errfile, $errline) {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }

    public static function handleException($exception) {
        $message = "Erreur : " . $exception->getMessage() . "\n";
        $message .= "Fichier : " . $exception->getFile() . "\n";
        $message .= "Ligne : " . $exception->getLine() . "\n";
        
        error_log($message);
        
        if (ini_get('display_errors')) {
            echo "<h1>Une erreur est survenue</h1>";
            echo "<pre>" . htmlspecialchars($message) . "</pre>";
        } else {
            echo "<h1>Une erreur interne est survenue</h1>";
        }
        
        exit(1);
    }
}