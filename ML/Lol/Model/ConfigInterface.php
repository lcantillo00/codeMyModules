<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace ML\Lol\Model;

/**
 * Contact module configuration
 *
 * @api
 * @since 100.2.0
 */
interface ConfigInterface
{
    /**
     * Recipient email config path
     */
    const XML_PATH_EMAIL_RECIPIENT = 'wholesale/email/recipient_email';

    /**
     * Sender email config path
     */
    const XML_PATH_EMAIL_SENDER = 'wholesale/email/sender_email_identity';

    /**
     * Email template config path
     */
    const XML_PATH_EMAIL_TEMPLATE = 'wholesale/email/email_template';

    /**
     * Enabled config path
     */
    const XML_PATH_ENABLED = 'wholesale/wholesale/enabled';

    /**
     * Check if contacts module is enabled
     *
     * @return bool
     * @since 100.2.0
     */
    public function isEnabled();

    /**
     * Return email template identifier
     *
     * @return string
     * @since 100.2.0
     */
    public function emailTemplate();

    /**
     * Return email sender address
     *
     * @return string
     * @since 100.2.0
     */
    public function emailSender();

    /**
     * Return email recipient address
     *
     * @return string
     * @since 100.2.0
     */
    public function emailRecipient();
}
