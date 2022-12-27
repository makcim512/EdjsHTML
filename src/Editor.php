<?php 
    namespace Edjs\Edjshtml;

    class Editor { 

        private $templates = [];

        function __construct(array $template = null) 
        { 
            if ( $template ) 
                $this->templates = $template;
        }

        /**
         * Add parameters to template
         * Edit old parameters in template
         * 
         * @param string $params 
         * 
         * @return void
         */
        public function blocks(array $params) 
        {
            $this->templates = array_merge($this->templates, $params);
        }

        /**
         * Render html
         * 
         * @param array $blocks
         * 
         * @return string
         */
        public function render(array $blocks) 
        {
            $result = [];

            foreach ($blocks as $block) {
                if (array_key_exists($block['type'], $this->templates)) {
                    $template = $this->templates[$block['type']];
                    $result[] = call_user_func_array($template, $block['data']);
                }
            }

            return implode($result);
        }
    }