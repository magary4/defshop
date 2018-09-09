<?php declare(strict_types=1);

namespace DefShop\Adapter\Core;

class Template
{
    private $viewsDir;

    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function setViewsDir(string $viewsDir): void
    {
        $this->viewsDir = $viewsDir;
    }

    /**
     * @param string $file   - Path to the PHP file that acts as a template.
     * @param array $args   - Associative array of variables to pass to the template file.
     * @return string - Output of the template file. Likely HTML.
     */
    public function render(string $file, array $args = []): ?string
    {
        // ensure the file exists
        if (!file_exists($this->viewsDir.$file.".php")) {
            return '';
        }

        // Make values in the associative array easier to access by extracting them
        if (is_array($args)) {
            extract($args);
        }

        // to use in templates
        $t = $this;

        // buffer the output (including the file is "output")
        ob_start();
        include $this->viewsDir.$file.".php";
        return ob_get_clean();
    }
}
