<?php
    namespace Edjs\Edjshtml;

    class Template {
        /**
         * Converts block to html by type
         * 
         * @return array
         */
        static function templates() 
        {   
            return [
                'paragraph' => function ($text) {
                    return "<p>{$text}</p>";
                },
                'header'    => function ($text, $level) {
                    return "<h{$level}>{$text}</h{$level}>";
                },
                'link'      => function ($link, $meta) {
                    $title = isset( $meta['title'] ) ? $meta['title'] : $link;
                    return "<a href=\"{$link}\">{$title}</a>";
                },
                'raw'       => function ($html) {
                    return $html;
                },
                'list'      => function($style, $items) {
                    $isType = $style == 'ordered' ? 'ol' : 'ul';
                    $li = [];
                    
                    foreach ($items as $item) 
                        $li[] = "<li>{$item}</li>";
                    
                    $li = implode($li);
                    return "<{$isType}>{$li}</{$isType}>";
                },
                'image'     => function($file, $caption, $widthBorder, $stretched, $withBackground) {
                    return "<img src=\"{$file['url']}\" title=\"{$caption}\" alt=\"{$caption}\"/>";
                },
                'AnyButton' => function($link, $text) {
                    return "<button onClick=\"location.href='{$link}'\">{$text}</button>";
                },
                'quote'     => function($text, $caption, $aligment) {
                    return "<blockquote><p>${text}</p><span>${caption}</span></blockquote>";
                },
                'table'     => function($withHeadings, $content) {
                    $tr = [];

                    foreach ($content as $key => $column) {
                        $td = [];

                        foreach ($column as $row)
                            if ($key == 0 && $withHeadings == True)
                                $td[] = "<th>$row</th>";
                            else
                                $td[] = "<td>$row</td>";

                        $td = implode($td);
                        $tr[] = "<tr>{$td}</tr>";
                    }

                    $tr = implode($tr);
                    return "<table>{$tr}</table>";
                }, 
                'embed'     => function($service, $source, $embed, $width, $height, $caption) {
                    return "<div class=\"embed\">
                                <iframe width=\"{$width}\" height=\"{$height}\" src=\"{$embed}\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>
                            </div>";
                }
            ];
        }

        /**
         * Get template
         * 
         * @param array $list
         * 
         * @return array
         */
        public static function templateList(array $list)
        {
            $result = []; 
        
            foreach ($list as $value)
                $result[$value] = self::templates()[$value];

            return $result;
        }
    }