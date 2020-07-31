

1.  注册接口

请求方式  POST
请求地址  ../php/register.php
请求数据  
|名称|是否必填|类型|
    |---|---|---|
    |user|是|string|
    |pwd|是|string|
    |phone|是|string|
    |email|是|string|

数据展示:
```
    {
        status:true,   // 登录状态  true=>成功
        msg:"注册成功"  // 提示信息
    }

```



2.  登录接口

请求方式  POST
请求地址  ../php/login.php
请求数据  
|名称|是否必填|类型|
    |---|---|---|
    |user|是|string|
    |pwd|是|string|

数据展示:
```
    {
        status:true,   // 请求状态  true=>成功  false=>失败
        msg:"注册成功"  // 提示信息
    }

```