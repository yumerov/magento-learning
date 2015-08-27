#Introduction

##1. Code organisation

* Magento uses [MVC architecture](http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)
* The files are grouped in **modules** based on functionality
* The modules are grouped in **code pools**

### Your code location

> app/code/local/{Package}/{Module}

* *local* is a code pool for local, project-spesific development.
* *Package* is your namespace
* *Module* is your module name

#### Example

> app/code/core/Mage/Catalog

To use your module you need a xml file in **app/etc/modules** with syntax:

```xml
<?xml version="1.0"?>
<config>
    <modules>
        <{Package}_{Module}>
            <active>true</active>
            <codePool>{code-pool}</codePool>
        </{Package}_{Module}>
    </modules>
</config>
```

#### Example

```xml
<?xml version="1.0"?>
<config>
    <modules>
        <Mage_Catalog>
            <active>true</active>
            <codePool>core</codePool>
        </Mage_Catalog>
    </modules>
</config>
```

##2. MVC

### Controllers

#### Location

> app/code/{code-pool}/{Package}/{Module}/controllers/{Name}Controller.php

#### Pure url

> http://{domain}/{front-name}/{controller}/{action}/{param}/{value}

#### Syntax

```php
class Mage_Catalog_CategoryController extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
        //main entry point
    }
}
```

#### Configuration


```xml
<frontend>
  <routers>
    <catalog>
      <use>standard</use>
      <args>
        <module>{Package}_{Module}</module>
        <frontName>{front-name}</frontName>
      </args>
    </catalog>
  </routers>
</frontend>
```

##### Example

```xml
<frontend>
  <routers>
    <catalog>
      <use>standard</use>
      <args>
        <module>LZY_Blog</module>
        <frontName>blog</frontName>
      </args>
    </catalog>
  </routers>
</frontend>
```

* `<use>standard</use>` - use for frontend
* `<frontName>{front-name}</frontName>` - module controllers url prefix

### Models

#### Registration

```xml
<models>
   <{package}_{module}>
      <class>{Package}_{Module}_Model</class>
  <{package}_{module}>
</models>
```

##### Example

```xml
<models>
   <lzy_blog>
      <class>LZY_Blog_Model</class>
  <lzy_blog>
</models>
```

#### Loading

```php
Mage::getModel('{module}/{model}');
```

##### Example

```php
Mage::getModel('catalog/product') //Mage_Catalog_Model_Product
```

##### Attributes

```php
Mage::getModel('catalog/product')->load(27)->getPrice()
```

### Helpers

Utility methods for common objects and tasks. By default *Data* helper is used.

```php
$helper = Mage::helper('catalog'); // Mage::helper('catalog/data')
```

## Observers

Magento applies the event-driven paradigm.

### Syntax

```xml
<events>
    <{event-name}>
        <observers>
            <{unique_name}>
                <type>{event-type}</type>
                <class>{module}/observer</class>
                <method>{method-name}</method>
            </{unique_name}>
        </observers>
    </{event-name}>
</events>
```

### Example

```xml
<events>
    <customer_login>
        <observers>
            <lzy_login>
                <type>model</type>
                <class>blog/observer</class>
                <method>userLogin</method>
            </lzy_login>
        </observers>
    </customer_login>
</events>
```

```php
class Lzy_Blog_Model_Observer
{
    public function userLogin($observer)
    {
        $data = $observer->getData();
    }
}
```

## Class overrides

Magento allows you to override class or class method. Calling a model in Magento is using **Mage::getModel()**. This static method implements factory mechanisms.

### Example

```php
class Lzy_Blog_Model_Product extends Mage_Catalog_Model_Product
{
  public function validate()
  {
    //add custom validation functionality here
    return $this;
  }
}
```

```xml
<models>
  <catalog>
    <rewrite>
      <product>Lzy_Blog_Model_Product</product>
    </rewrite>
  </catalog>
</models>
```