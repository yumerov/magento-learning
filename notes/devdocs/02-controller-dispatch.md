# Controller Dispatch

## Syntax

> http://{domain}/{front-name}/{controller}/{action}/

```xml
<config>
  <frontend>
    <routers>
      <{unique-name}>
        <use>standard</use>
        <args>
          <module>{package}_{module}</module>
          <frontName>{front-name}</frontName>
        </args>
      </{uniqie-name}>
    </routers
  </frontend>
</config>
```

```php
class {package}_{module}_{controller}Controller extends Mage_Core_Controller_Front_Action
{
	public function {action}Action ()
	{
		// action content
	}
}
```

## Example

> http://example.com/blog/post/view/

```xml
<config>
  <frontend>
    <routers>
      <blog_router>
        <use>standard</use>
        <args>
          <module>Lzy_Blog</module>
          <frontName>blog</frontName>
        </args>
      </blog_router>
    </routers
  </frontend>
</config>
```

```php
class Lzy_Blog_PostController extends Mage_Core_Controller_Front_Action
{
	public function viewAction ()
	{
		// action content
	}
}
```