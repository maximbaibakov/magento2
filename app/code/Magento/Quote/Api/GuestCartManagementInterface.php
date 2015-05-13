<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Quote\Api;

use Magento\Quote\Api\Data\PaymentInterface;

/**
 * Cart Management interface for guest carts.
 */
interface GuestCartManagementInterface
{
    /**
     * Enables an customer or guest user to create an empty cart and quote for an anonymous customer.
     *
     * @return string Cart ID.
     * @throws \Magento\Framework\Exception\CouldNotSaveException The empty cart and quote could not be created.
     */
    public function createEmptyCart();

    /**
     * Assigns a specified customer to a specified shopping cart.
     *
     * @param string $cartId The cart ID.
     * @param int $customerId The customer ID.
     * @param int $storeId
     * @return boolean
     */
    public function assignCustomer($cartId, $customerId, $storeId);

    /**
     * Places an order for a specified cart.
     *
     * @param string $cartId The cart ID.
     * @param int[]|null $agreements
     * @param PaymentInterface|null $paymentMethod
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @return int Order ID.
     */
    public function placeOrder($cartId, $agreements = null, PaymentInterface $paymentMethod = null);

    /**
     * Registers a customer and places an order for the specified cart.
     *
     * @param string $cartId The cart ID.
     * @param \Magento\Customer\Api\Data\CustomerInterface $customer
     * @param string $password
     * @param int[]|null $agreements
     * @param PaymentInterface|null $paymentMethod
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @return int Order ID.
     */
    public function placeOrderCreatingAccount(
        $cartId,
        $customer,
        $password,
        $agreements = null,
        PaymentInterface $paymentMethod = null
    );
}
