<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Output\ConsoleOutput;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    
    const REFERENCE_ADMIN_USER = 'adminuser';

    /** @var ContainerInterface */
    private $container;

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $tokenGenerator = $this->container->get('fos_user.util.token_generator');
        $password = 'admin';

        $admin_user = $this->createUser(
            $manager,
            'admin',
            $password,
            'admin@domain.com',
            array('ROLE_SUPER_ADMIN'),
            array(),
            true
        );

        $manager->flush();

        $output = new ConsoleOutput();
        $output->writeln(array(
            "<comment>  > ADMIN user 'admin' created with password '$password'</comment>",
        ));

        $this->setReference(self::REFERENCE_ADMIN_USER, $admin_user);
    }

    /**
     * Create a user
     *
     * @param ObjectManager $manager The object manager
     * @param string        $username The username
     * @param string        $password The plain password
     * @param string        $email The email of the user
     * @param array         $roles The roles the user has
     * @param array         $groups The groups the user belongs to
     * @param bool          $enabled Enable login for the user
     *
     * @return User
     */
    private function createUser(
        ObjectManager $manager,
        $username,
        $password,
        $email,
        array $roles = array(),
        array $groups = array(),
        $enabled = false
    ) {
        $user = $this->container->get('fos_user.user_manager')->createUser();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setRoles($roles);
        $user->setEmail($email);
        $user->setEnabled($enabled);
        foreach ($groups as $group) {
            $user->addGroup($group);
        }

        $manager->persist($user);

        return $user;
    }


    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder()
    {
        return 40;
    }
}