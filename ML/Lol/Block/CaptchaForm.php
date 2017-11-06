<?php
namespace ML\Lol\Block;


class CaptchaForm extends \Magento\Framework\View\Element\Template
{
public function getFormAction()
{
return $this->getUrl('wholesale/index/post', ['_secure' => true]);
}
}