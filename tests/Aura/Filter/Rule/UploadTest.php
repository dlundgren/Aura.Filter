<?php
namespace Aura\Filter\Rule;

use Aura\Filter\AbstractRuleTest;

class UploadTest extends AbstractRuleTest
{
    protected $expect_message = 'FILTER_RULE_FAILURE_IS_UPLOAD';
    
    protected $good_upload = array(
        'error'     => UPLOAD_ERR_OK,
        'name'      => 'file.jpg',
        'size'      => '1024',
        'tmp_name'  => '/tmp/asdfghjkl.jpg',
        'type'      => 'image/jpeg',
        'extra_key' => 'extra',
    );
    
    protected $bad_upload_1 = array(
        'error'     => UPLOAD_ERR_PARTIAL,
        'name'      => 'file.jpg',
        'size'      => '1024',
        'tmp_name'  => '/tmp/asdfghjkl.jpg',
        'type'      => 'image/jpeg',
        'extra_key' => 'extra',
    );
    
    protected $bad_upload_2 = array(
        'error'     => 96,
        'name'      => 'file.jpg',
        'size'      => '1024',
        'tmp_name'  => '/tmp/asdfghjkl.jpg',
        'type'      => 'image/jpeg',
        'extra_key' => 'extra',
    );
    
    protected function getClass()
    {
        $class = parent::getClass();
        $class = str_replace('Upload', 'MockUpload', $class);
        return $class;
    }
    
    public function providerIs()
    {
        return array(
            array($this->good_upload),
        );
    }
    
    public function providerIsNot()
    {
        return array(
            array(null), // not an array,
            array($this->bad_upload_1),
            array($this->bad_upload_2),
        );
    }
    
    public function providerFix()
    {
        $fixed = array(
            'error'     => UPLOAD_ERR_OK,
            'name'      => 'file.jpg',
            'size'      => '1024',
            'tmp_name'  => '/tmp/asdfghjkl.jpg',
            'type'      => 'image/jpeg',
        );
        
        return array(
            array(array(), false, array()), // can't fix
            array($this->good_upload, true, $fixed),
        );
    }
    
    public function testRuleIs_notUploadedFile()
    {
        list($data, $field) = $this->getPrep($this->good_upload);
        $rule = $this->newRule($data, $field);
        $rule->is_uploaded_file = false;
        $this->assertFalse($rule->is());
    }
}
