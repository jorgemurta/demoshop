<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Form\Multipage;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ShippingType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'shippingAddressForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('someText', 'text', [
                'required' => false,
                'attr' => [
                    'tabindex' => 100,
                    'class' => 'padded js-checkout-email input_field field_left',
                    'placeholder' => 'customer.email',
                ],
            ])
            ->add('payment', 'submit',[

            ]);
    }
}
