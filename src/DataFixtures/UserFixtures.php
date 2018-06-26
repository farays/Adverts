<?php
namespace App\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    public const ADMIN_USER_REFERENCE = 'admin-user';

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
    public function load(ObjectManager $manager, $annonce_user)
    {
        $tokenGenerator = $this->container->get('fos_user.util.token_generator');
        $password = 'admin';

        $annonce_user = $this->createUser(
            $manager,
            'annonce',
            $password,
            'annonce@domain.com',
            $this->container->getParameter('en'),
            array('ROLE_SUPER_ADMIN'),
            array($manager->merge($this->getReference(GroupFixtures::REFERENCE_SUPERADMINS_GROUP))),
            true,
            true
        );

        $manager->flush();

        $output = new ConsoleOutput();
        $output->writeln(array(
            "<comment>  > ANNONCE user 'annonce' created with password '$password'</comment>",
        ));

        $this->setReference(self::REFERENCE_IUTUDC_USER, $annonce_user);
    }

    /**
     * Create a user
     *
     * @param ObjectManager $manager The object manager
     * @param string        $username The username
     * @param string        $password The plain password
     * @param string        $email The email of the user
     * @param string        $locale The locale (language) of the user
     * @param array         $roles The roles the user has
     * @param array         $groups The groups the user belongs to
     * @param bool          $enabled Enable login for the user
     * @param bool          $changed Disable password changed for the user
     *
     * @return User
     */
    private function createUser(
        ObjectManager $manager,
        $username,
        $password,
        $email,
        $locale,
        array $roles = array(),
        array $groups = array(),
        $enabled = false,
        $changed = false
    ) {
        $user = $this->container->get('fos_user.user_manager')->createUser();
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setRoles($roles);
        $user->setEmail($email);
        $user->setEnabled($enabled);
        $user->setAdminLocale($locale);
        $user->setPasswordChanged($changed);
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