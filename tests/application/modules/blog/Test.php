<?php
class Blog_Test extends PHPUnit_Framework_TestSuite
{

    public static function suite()
    {
        require_once 'IndexControllerTest.php';
        require_once 'PostControllerTest.php';

        $suite = new self('Blog');

        $suite->addTest(new PHPUnit_Framework_TestSuite('Blog_IndexControllerTest'));
        $suite->addTest(new PHPUnit_Framework_TestSuite('Blog_PostControllerTest'));

        return $suite;
    }


    protected function setUp()
    {
        ControllerTestCase::migrationUp('categories');
        ControllerTestCase::migrationUp('comments');
        ControllerTestCase::migrationUp('blog');
    }

    protected function tearDown()
    {
        ControllerTestCase::migrationDown('blog');
        ControllerTestCase::migrationDown('comments');
        ControllerTestCase::migrationDown('categories');
    }

}
