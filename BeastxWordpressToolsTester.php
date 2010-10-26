<?php
/*
Plugin Name: Beastx Wordpress Tools Tester
Plugin URI: http://www.beastxblog.com/projects/wordpress-plugins/Beastx-WPProjects/
Description: Adding projects post type functionality.
Version: 1.0
Author: Beastx
Author URI: http://www.beastxblog.com/
Text Domain: BeastxWPProjects
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

if (!defined('ABSPATH')) die("Aren't you supposed to come here via WP-Admin?");

require_once 'BeastxWordpressTools/includeBeastxWordpressTools.php';
require_once 'ProjectPostType.php';

if (!class_exists('BeastxWordpressToolsTester')) {

Class BeastxWordpressToolsTester extends BeastxPlugin {

    public function __construct() {
        parent::__construct();
        
        $this->testRegisterPluginLinks();
        $this->testRegisterDashboardWidget();
        $this->testRegisterCustomHelp();
        $this->testRegisterFavoriteOption();
        $this->testRegisterBuiltInAssets();
        $this->testRegisterAssets();
        $this->testRegisterExternalAssets();
        $this->testRegisterInlineAssets();
        
        $this->postType = new ProjectPostType();
        debug($this->postType);
    }
    
    function testRegisterBuiltInAssets() {
        $this->addRowEditorAssets(array(array('section' => 'posts', 'subSection' => 'addnew')));
        $this->addRowJqueryUIAssets(array(array('section' => 'posts', 'subSection' => 'addnew')));
    }
    
    function testRegisterAssets() {
        $this->registerStyle(
            'adminpage',
            'adminpage.css',
            array(array('section' => 'posts', 'subSection' => 'addnew'))
        );
        
        $this->registerScript(
            'RowEditor',
            'RowEditor.js',
            array(array('section' => 'settings', 'subSection' => 'reading')),
            array(),
            '2.1',
            true
        );
    }
    
    function testRegisterExternalAssets() {
        $this->registerExternalStyle(
            'ikariam',
            'http://s2.ar.ikariam.com/skin/ik_common_0.4.0.css',
            array(array('section' => 'settings', 'subSection' => 'reading'))
        );
        
        $this->registerExternalScript(
            'ikariam',
            'http://s2.ar.ikariam.com/js/complete-0.4.0.js',
            array(array('section' => 'settings', 'subSection' => 'reading'))
        );
    }
    
    function testRegisterInlineAssets() {
        $this->registerInlineStyle(
            "body #site-title { color: red !important; }",
            array(array('section' => 'settings', 'subSection' => 'discussion'))
        );
        $this->registerInlineScript(
            "console.log('pepe')",
            array(array('section' => 'settings', 'subSection' => 'discussion')),
            true
        );
    }
    
    function testRegisterPluginLinks() {
        $this->registerPluginActionLink('PEPE1', 'http://www.pepe1.com');
        $this->registerPluginMetaLink('PEPE2', 'http://www.pepe2.com');
    }
    
    function testRegisterDashboardWidget() {
        $this->registerDashboardWidget('dashboardWidgetTest', 'Dashboard Widget Test', array(&$this, 'dashboardWidget'));
    }
    
    function testRegisterCustomHelp() {
        $this->registerCustomHelp(
            array(
                'section' => 'settings',
                'subSection' => 'general'
            ),
            array(&$this, 'optionsCustomHelp'),
            true
        );
    }
    
    function testRegisterFavoriteOption() {
        $this->removeFavoriteOption('edit.php?post_status=draft');
        $this->addFavoriteOption('http://www.pepe3.com', 'Pepe3');
    }
    
    public function optionsCustomHelp() {
        echo '<h1>Custom Help Test</h1>';
        echo '<p>Esto es un test!</p>';
    }
    
    public function dashboardWidget() {
        echo '<h1>Custom Dashboard Widget Test</h1>';
        echo '<p>Esto es un test!</p>';
    }
    
    public function onInit() { debug('BeastxWordpressToolsTester::onInit'); }
    public function onAdminInit() { debug('BeastxWordpressToolsTester::onAdminInit'); }
    public function onPluginLoad() { debug('BeastxWordpressToolsTester::onPluginLoad'); }
    public function onPluginActivate() { debug('BeastxWordpressToolsTester::onPluginActivate'); }
    public function onPluginDeactivate() { debug('BeastxWordpressToolsTester::onPluginDeactivate'); }
    public function onSavePost() { debug('BeastxWordpressToolsTester::onSavePost'); }
    public function onGetContent() { debug('BeastxWordpressToolsTester::onGetContent'); }
    public function onGetPosts() { debug('BeastxWordpressToolsTester::onGetPosts'); }
    
}

new BeastxWordpressToolsTester();

}
?>