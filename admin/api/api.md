## 验证登录的接口
    type:post
    url:api/doLogin.php
    data:
        email:邮箱
        password:密码
    
    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 验证是否登录的接口
    type:get
    url:api/checkLogin.php
    data:无

    响应体:json
        已登录: {"msg":"ok","code":0}
        未登录: {"msg":"fail","code":1}

## 退出登录的接口
    type:get
    url:api/doLogout.php
    data:无

    响应体:
        无

## 显示登录用户信息的接口
    type:get
    url:api/getUesrInfo.php
    data:无

    响应体: json

        {"id":"2","slug":"jack","email":"jack@heima.com","password":"123456","nickname":"\u6770\u514b","avatar":"\/uploads\/avatar_1.jpg","bio":null,"status":"activated"}

## 显示网站文章内容的接口
    type:get 
    url:api/getWebInfo.php
    data:无

    响应体: json
    
        {"wenzhang": 754, "caogao": 229, "fenlei": 4, "pinglun": 426, "daishenhe": 83}

## 获取评论数量分页的接口
    type:get
    url:api/getComments.php
    data:
        pageIndex:1
        pageSize:10

    响应体:json

        [{"data":data,"totalPages":totalPages}]

## 修改评论的接口
    type:post
    url:api/updateComments.php
    data:
        status:修改的状态
        ids:要修改的id  多个id中用逗号隔开
    
    响应体:json
        
        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 获取文章的接口
    type:get
    url:api/getPosts.php
    data:
        pageIndex:页码
        pageSize:页容量
        category:分类
        status:状态
    
    响应体:json

         [{"data":data,"totalPages":totalPages}]
## 获取分类的接口
    type:get
    url:api/getCategory.php
    data:无

    响应体:json

        [{},{},{}]

## 删除文章的接口
    type:post
    url:api/deletePosts.php
    data:
        ids:要删除的id  多个id中用逗号隔开

    响应体:json
        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 添加文章的接口
    type:post
    url:api/addPosts.php
    data:
        title:
        content:
        slug:
        feature:
        category:
        created:
        status:

    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 获取文章内容的接口
    type:get
    url:api/getPostsById.php
    data:
        id:

    响应体:json

        {"title":"content":"slug":"feature":"category":"created":"status"}

## 修改文章内容的接口
    type:post
    url:api/updatePosts.php
    data:
        id:
        title:
        content:
        slug:
        feature:
        category:
        created:
        status:

    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 添加分类的接口
    type:post
    url:api/addCategory.php
    data:
        name:
        slug:

    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 删除分类的接口
    type:post
    url:api/deleteCategory.php
    data:
        ids:要删除的id  多个id中用逗号隔开

    响应体:json
        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 根据id查询分类的接口
    type:get
    url:api/getCategoryById.php
    data:
        id:
    
    响应体:json

## 修改分类的接口
    type:post
    url:api/updateCategory.php
    data:
        id:
        name:
        slug:

    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 获取用户的接口
    type:get
    url:api/getUsers.php
    data:无

    响应体:json

        [{"id":"1","slug":"admin","email":"admin@heima.me","password":"123456","nickname":"\u7ba1\u7406\u5458","avatar":"\/uploads\/avatar.jpg","bio":null,"status":"activated"},{"id":"2","slug":"jack","email":"jack@heima.com","password":"123456","nickname":"\u6770\u514b","avatar":"\/uploads\/avatar_1.jpg","bio":null,"status":"activated"},{"id":"3","slug":"rose","email":"rose@heima.com","password":"123456","nickname":"\u8089\u4e1d","avatar":"\/uploads\/avatar_2.jpg","bio":null,"status":"activated"}]
        
## 删除用户的接口
    type:post
    url:api/deleteUsers.php
    data:
        ids:要删除的id  多个id中用逗号隔开

    响应体:json
        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 添加用户的接口
    type:post
    url:api/addUsers.php
    data:
        email:
        slug:
        nickname:
        password:

    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 根据id查询用户的接口
    type:get
    url:api/getUsersById.php
    data:
        id:
    
    响应体:json


## 修改用户的接口
    type:post
    url:api/updateUsers.php
    data:
        id:
        email:
        slug:
        nickname:
        password:

    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 更新个人信息的接口
    type:post
    url:api/updateProfile.php
    data:
        avatar:
        email:
        slug:
        nickname:
        bio:
    
    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 修改密码的接口
    type:post
    url:api/updatePassword.php
    data:
        old:
        new:

    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 获取轮播图的接口
     type:get
     url:api/getSliders.php
     data:无

     响应体:json

        [{},{}]

## 添加轮播图的接口
    type:post
    url:api/addSliders.php
    data:
        image:
        text;
        link:
    
    响应体:json
        
        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

## 删除轮播图的接口
    type:post
    url:api/deleteSliders.php
    data:
        ids:

    响应体:json

        成功: {"msg":"ok","code":0}
        失败: {"msg":"fail","code":1}

