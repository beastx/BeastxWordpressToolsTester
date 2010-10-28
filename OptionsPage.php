<?

class BeastxProjectOptionsPage extends BeastxAdminPage {
    
    function __construct() {
        parent::__construct();
        $this->pageTitle = __('Configurations', $this->textDomain);
        $this->iconClass = 'icon-options-general';
    }
    
    function display() {
        $this->printTemplate('testAdminPage');
    }
    
    function saveFormAction($post) {
        debug('save options');
        $this->saveMsg = __('Options has been saved', $this->textDomain);
        header('location:/wp-admin/admin.php?page=Beastx-WPProjects/Beastx-WPProjects.php');
    }
    
    function resetFormAction() {
        debug('reset options');
        $this->plugin->registerDefaultOptions();
        $this->saveMsg = __('Options has been reseted', $this->textDomain);
    }
    
    function getInputsFromOptions($setcion, $options) {
        $inputs = array();
        foreach($options['options'] as $optionId => $option) {
            array_push(
                $inputs,
                $this->makeBoxRow(
                    $option['label'],
                    $option['description'],
                    array(
                        'type' => $option['type'],
                        'name' => 'option_' . $setcion . '_' . $optionId,
                        'value' => $option['value']
                    )
                )
            );
        }
        return $inputs;
    }
    
    function getMainBox() {
        $content = array(
            '<div id="categoriesContainer"></div>',
            '<input id="addCategoryButton" class="button rowEditorButton" type="button" value="' . __('Add new category', $this->textDomain) . '" />'
        );
        $this->makeBox(
            'main', 
            'licences', 
            __('Project Licences', $this->textDomain),
            $content,
            false
        );
    }
    
    function getCategoriesBox() {
        $content = array(
            '<div id="categoriesContainer"></div>',
            '<input id="addCategoryButton" class="button rowEditorButton" type="button" value="' . __('Add new category', $this->textDomain) . '" />'
        );
        $this->makeBox(
            'licences', 
            __('Categories', $this->textDomain),
            null,
            'test content',
            true
        );
    }
    
    function getLicencessBox() {
        $content = array(
            '<div id="categoriesContainer"></div>',
            '<input id="addCategoryButton" class="button rowEditorButton" type="button" value="' . __('Add new category', $this->textDomain) . '" />'
        );
        
        $this->makeBox(
            'licences', 
            __('Project Licences', $this->textDomain),
            __('Project Licences', $this->textDomain),
            $content,
            true
        );
    }
    
    function getFoldersBox() {
        $content = array(
            '<div id="categoriesContainer"></div>',
            '<input id="addCategoryButton" class="button rowEditorButton" type="button" value="' . __('Add new category', $this->textDomain) . '" />'
        );
        $this->makeBox(
            'folders', 
            'licences', 
            __('Project Licences', $this->textDomain),
            $content,
            false
        );
    }
    
    function getStatsBox() {
        $content = array(
            '<div id="categoriesContainer"></div>',
            '<input id="addCategoryButton" class="button rowEditorButton" type="button" value="' . __('Add new category', $this->textDomain) . '" />'
        );
        $this->makeBox(
            'stats', 
            'licences', 
            __('Project Licences', $this->textDomain),
            $content,
            false
        );
    }
    
    function getItemsBox() {
        $content = array(
            '<div id="categoriesContainer"></div>',
            '<input id="addCategoryButton" class="button rowEditorButton" type="button" value="' . __('Add new category', $this->textDomain) . '" />'
        );
        $this->makeBox(
            'items', 
            'licences', 
            __('Project Licences', $this->textDomain),
            $content,
            false
        );
    }
}

?>