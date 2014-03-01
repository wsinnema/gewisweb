<?php

namespace Education\Service;

use Zend\ServiceManager\ServiceManager,
    Zend\ServiceManager\ServiceManagerAwareInterface;

/**
 * Exam service.
 */
class Exam implements ServiceManagerAwareInterface
{

    /**
     * Service manager.
     *
     * @var ServiceManager
     */
    protected $sm;

    /**
     * Check if a operation is allowed for the current user.
     *
     * @param string $operation Operation to be checked.
     * @param string|ResourceInterface $resource Resource to be checked
     *
     * @return boolean
     */
    public function isAllowed($operation, $resource = 'exam')
    {
        return $this->getAcl()->isAllowed(
            $this->getRole(),
            $resource,
            $operation
        );
    }

    /**
     * Get the current user's role.
     *
     * @return UserModel|string
     */
    public function getRole()
    {
        return $this->sm->get('user_role');
    }

    /**
     * Get the Acl.
     *
     * @return Zend\Permissions\Acl\Acl
     */
    public function getAcl()
    {
        return $this->sm->get('education_acl');
    }

    /**
     * Get the Upload form.
     *
     * @return \Education\Form\Upload
     */
    public function getUploadForm()
    {
        return $this->sm->get('education_form_upload');
    }

    /**
     * Get the SearchExam form.
     *
     * @return \Education\Form\SearchCourse
     */
    public function getSearchCourseForm()
    {
        return $this->sm->get('education_form_searchcourse');
    }

    /**
     * Set the service manager.
     *
     * @param ServiceManager $sm
     */
    public function setServiceManager(ServiceManager $sm)
    {
        $this->sm = $sm;
    }

    /**
     * Get the service manager.
     *
     * @return ServiceManager
     */
    public function getServiceManager()
    {
        return $this->sm;
    }
}

