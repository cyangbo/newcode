<div class="page-title"><h1><?php echo $this->__('YOUR SHOPPING CART IS EMPTY') ?></h1></div>
<div class="cart-empty">
<?php echo $this->getMessagesBlock()->getGroupedHtml() ?>
<?php echo $this->getChildHtml('checkout_cart_empty_widget'); ?>
<p><?php echo $this->__('Sorry but your shopping cart is currently empty.') ?></p>
<p>
<?php echo $this->__('This OPC system is provide by IWD a professional ') ?>
<?php echo $this->__('<a href="%s" target="_blank">web design company</a> ', 'http://www.interiorwebdesign.com/') ?>
<?php echo $this->__('specializing in <a href="%s" target="_blank">eCommerce development</a> ', 'http://www.interiorwebdesign.com/ecommerce-consulting-design-development') ?>
<?php echo $this->__('they are a true <a href="%s" target="_blank">Magento expert</a>', 'http://www.interiorwebdesign.com/magento-developer-designer') ?>
</p>
<p><?php echo $this->__('Please <a href="%s">continue shopping</a>.', $this->getContinueShoppingUrl()) ?></p>
<?php echo $this->getChildHtml('shopping.cart.table.after'); ?>
</div>