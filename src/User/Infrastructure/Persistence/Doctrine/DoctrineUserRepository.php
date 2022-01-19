<?php


namespace App\User\Infrastructure\Persistence\Doctrine;


use App\User\Domain\Repository\UserRepository;
use App\User\Domain\User;
use App\User\Infrastructure\SymfonyUser\SymfonyUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class DoctrineUserRepository implements UserRepository
{

    public function __construct(private EntityManagerInterface $entityManager, private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function create(User $user): void
    {
        $symfonyUser = new SymfonyUser($user->id(), $user->name(), $user->email()->email(), $user->password()->password());
        $hashedPassword = $this->passwordHasher->hashPassword(
            $symfonyUser,
            $user->password()->password()
        );

        $symfonyUser->setPassword($hashedPassword);

        $this->entityManager->persist($symfonyUser);
        $this->entityManager->flush();
    }

    public function getAll(): array
    {
        $repository = $this->entityManager->getRepository(SymfonyUser::class);
        return $repository->findAll();
    }

}