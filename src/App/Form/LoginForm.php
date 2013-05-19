<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class LoginForm extends AbstractType {
    public function getName() { return "app_login"; }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('username', 'text', [
                'label'       => 'Username',
                'constraints' => [new Assert\NotBlank()],
            ]);
    }
}