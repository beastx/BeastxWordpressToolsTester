<?php
/*
Name: ProjectPostType Class
Description: Several functions/tools to make the plugins devlopment more easy.
Version: 1.0
Author: Beastx
Author URI: http://www.beastxblog.com/
*/

/*
    Copyright 2010 Beastx (Leandro Asrilevich) (http://beastxblog.com/)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

Class ProjectPostType extends BeastxCustomPostType {

    public function __construct() {
        parent::__construct();
        
        $this->registerPostTypeVar('test', 234, 'int');
        $this->addMetaBox('Test');
        
        $this->registerPostType(
            'pepe',
            array(
                'labels' => array(
                    'name' => __('Projects', $this->textDomain),
                    'singular_name' => __('Project', $this->textDomain),
                    'add_new' => __('Add New', $this->textDomain),
                    'add_new_item' => __('Add New Project', $this->textDomain),
                    'edit' => __('Edit', $this->textDomain),
                    'edit_item' => __('Edit Project', $this->textDomain),
                    'new_item' => __('New Project', $this->textDomain),
                    'view' => __('View Project', $this->textDomain),
                    'view_item' => __('View Project', $this->textDomain),
                    'search_items' => __('Search Projects', $this->textDomain),
                    'not_found' => __('No Projects found', $this->textDomain),
                    'not_found_in_trash' => __('No Projects found in Trash', $this->textDomain),
                    'parent' => __('Parent Project', $this->textDomain),
                ),
                'description' => __('A super duper is a type of content that is the most wonderful content in the world. There are no alternatives that match how insanely creative and beautiful it is.', $this->textDomain),
                'public' => true,
                'show_ui' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'menu_position' => 5,
                'menu_icon' => $this->pluginBaseUrl . '/assets/images/logoSmall.png',
                'hierarchical' => false,
                'query_var' => true,
                'supports' => array('title', 'editor'),
                'taxonomies' => array('post_tag'),
                'can_export' => true
            )
        );
    }
    
    
    public function testMetaBox() {
        echo '<input type="text" name="' . $this->getInputName('test') . '" value="' . $this->getVarValue('test') . '" />';
    }
    
    public function customPostColumns($columns) {
        unset($columns['comments']);
        unset($columns['author']);
        $columns["project_version"] = __('Version', $this->textDomain);
        $columns["project_category"] = __('Category', $this->textDomain);
        return $columns;
    }

    public function custonPostRowValues($column) {
        global $post;
        //~ $custom = get_post_custom();
        //~ switch ($column) {
            //~ case "project_descripcion":
                //~ echo the_excerpt();
                //~ break;
            //~ case "project_category":
                //~ $categories = $this->getOptionValue('categories', 'categories');
                //~ for ($i = 0; $i < count($categories); ++$i) {
                    //~ if ($custom["project_category"][0] == $categories[$i]['id']) {
                        //~ echo $categories[$i]['categoryName'];
                    //~ }
                //~ }
                //~ break;
            //~ case "project_version":
                //~ echo $custom["project_version"][0];
                //~ break;
            //~ case "project_otherNotes":
                //~ echo $custom["project_otherNotes"][0];
                //~ break;
        //~ }
    }
    
    public function onGetContent($content) { 
        global $wp;
        global $post;
        if (!empty($wp->query_vars['post_type']) && $wp->query_vars['post_type'] == $this->postType) {
            return 'pepe';
        } else {
            return $content;
        }
    }
    
    public function onGetPosts($query) { 
        //~ if ($this->getOptionValue('main', 'showAsNormalPostInFrontEnd')) {
            if (is_home() && false == $query->query_vars['suppress_filters']) {
                $query->set('post_type', array( 'post', $this->postType, 'quote', 'attachment' ));
            }
        //~ }
        return $query;
    }
    
}

?>