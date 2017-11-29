<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Core\Configure;

class WikiForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('link', 'string');
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('link', 'valid', ['rule' => 'url']);
    }

    protected function _execute(array $data)
    {
        Configure::write('Wiki.link', ($wiki['link']));
        Configure::dump('wiki', 'default', ['Wiki']);
        return true;
    }
}
?>
