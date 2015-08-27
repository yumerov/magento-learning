# Configuration

## Module Directory Structure

Module - a group of php and xml files meant to extend the system with new functionality or override core behavior.

### Location

> app/code/{code-pool}/{package}/{module}

**Code pool** is a group of packages.

	* local - for project-specific modules
	* community - for common modules
	* core - for core magento files

**Package** - namespace/group name for modules of the vendor.

#### Example

> app/code/community/Lzy/Blog

> app/code/local/Lzy/SEO

### Subdirectories

- etc - configuration xml files
- Block
- controllers
- Helper
- Model
- sql - install and upgrade files

### Mandatory files


#### Syntax

```xml
<!-- app/etc/modules/{package}_{module}.xml -->
<config>
    <modules>
        <{package}_{module}>
            <active>true</active>
            <codePool>{code-pool}</codePool>
        </{package}_{module}>
    </modules>
</config>
```

```xml
<!-- app/code/{code-pool}/{package}/{module}/etc/config.xml -->
<config>
    <modules>
        <{package}_{module}>
            <version>0.1.0</version>
        </{package}_{module}>
    </modules>
</config>
```

#### Example

```xml
<!-- app/etc/modules/Lzy_Blog.xml -->
<config>
    <modules>
        <Lzy_Blog>
            <active>true</active>
            <codePool>community</codePool>
        </Lzy_Blog>
    </modules>
</config>
```

```xml
<!-- app/code/local/Lzy/Blog/etc/config.xml -->
<config>
    <modules>
        <Lzy_Blog>
            <version>0.1.0</version>
        </Lzy_Blog>
    </modules>
</config>
```