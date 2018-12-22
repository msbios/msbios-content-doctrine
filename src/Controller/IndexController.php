<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Content\Doctrine\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use MSBios\Content\Resource\Doctrine\Entity\TextPage;
use MSBios\Doctrine\DBAL\Types\PublishingStateType;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package MSBios\Content\Doctrine\Controller
 */
class IndexController extends \MSBios\Content\Controller\IndexController implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    /**
     * IndexController constructor.
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        /** @var TextPage $textPage */
        $textPage = $this->getObjectManager()->getRepository(TextPage::class)->findOneBy([
            'slug' => $this->params()->fromRoute('permalink'),
            'state' => $this->params()->fromQuery('state', PublishingStateType::PUBLISHING_STATE_PUBLISHED),
            'rowStatus' => true
        ]);

        if (! $textPage) {
            return $this->notFoundAction();
        }

        return new ViewModel(['page' => $textPage]);
    }
}
