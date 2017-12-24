/**
 * 定义Ext初始化参数
 */

Ext.BLANK_IMAGE_URL =  tpl + "/Public/Ext/resources/images/default/s.gif";

Ext.chart.Chart.CHART_URL = tpl + "/Public/Ext/resources/charts.swf";
	
Ext.QuickTips.init();

Ext.form.Field.prototype.msgTarget = 'side';

//Ext.util.CSS.swapStyleSheet("theme", "Ext/resources/css/xtheme-blue.css"); 

/**
 * 定义MenuPanel类
 */
MenuPanel = Ext.extend(Ext.Panel , {

    constructor : function(){

        MenuPanel.superclass.constructor.call(this , {

            id : "menu" ,
            region : "west" ,
            title : "系统管理菜单" ,
            split : true ,
            width : 200 ,
            height : 'auto' ,
            //minSize : 175 ,
            //maxSize : 500 ,
            collapsible : true ,
            //margins : "0 0 5 5" ,
            layout : "accordion" ,
            border : true ,
            layoutConfig : {
                titleCollapse : true ,
                animate : true ,
                activeOnTop: false
            } ,
            items : [  
          
            {
                title : "<font color=#990000>&nbsp;菜单管理</font>" ,
                iconCls : 'menu-list',
                border : false,
                items : [new AccountMenuPanel()]
            } ,
{
                title : "<font color=#990000>&nbsp;会员管理</font>" ,
                iconCls : 'have_connect',
                border : false,
                items : [new UserMenuPanel()]
            },
            {
                title : "<font color=#990000>&nbsp;内容管理</font>" ,
                iconCls : 'have_connect',
                border : false,
                items : [new ContentPanel()]
            },
            {
                title : "<font color=#990000>&nbsp;扩展管理</font>" ,
                iconCls : 'have_connect',
                border : false,
                items : [new ModulesPanel()]
            }]
        }) ;
    }
}) ;

/*******************************************************************************************************************/

 

UserMenuPanel = Ext.extend(Ext.tree.TreePanel , {

    managerroot : null ,
    loadMask : null ,
    constructor : function(){

        var root = new Ext.tree.AsyncTreeNode({
            id : 'user' ,
            text : '管理目录' ,
            draggable : false
        }) ;
		
        UserMenuPanel.superclass.constructor.call(this , {

            id : 'adminmanager-menu' ,
            autoScroll : true ,
            enableDD : false ,//是否支持拖拽效果
            containerScroll : true ,//是否支持滚动条
            //split : true ,
            root : root ,
            rootVisible : false ,//是否显示跟节点
            collapseMode : 'mini' ,//在分割线处出现按钮
            hideCollapseTool  :true ,
            lines : false ,
            border : false ,
            collapsible : true ,
            //margins : '0 0 5 5' ,
            loader : new Ext.tree.TreeLoader({
                dataUrl : app + '/Index/Expand'
            })
        }) ;
        node_div='node-div';
        this.on('click' , menuClickAction , this) ;
				
    } 
		    
}) ;


ContentPanel = Ext.extend(Ext.tree.TreePanel , {

    managerroot : null ,
    loadMask : null ,
    constructor : function(){

        var root = new Ext.tree.AsyncTreeNode({
            id : 'content' ,
            text : '管理目录' ,
            draggable : false
        }) ;
		
        ContentPanel.superclass.constructor.call(this , {

            id : 'content-menu' ,
            autoScroll : true ,
            enableDD : false ,//是否支持拖拽效果
            containerScroll : true ,//是否支持滚动条
            //split : true ,
            root : root ,
            rootVisible : false ,//是否显示跟节点
            collapseMode : 'mini' ,//在分割线处出现按钮
            hideCollapseTool  :true ,
            lines : false ,
            border : false ,
            collapsible : true ,
            //margins : '0 0 5 5' ,
            loader : new Ext.tree.TreeLoader({
                dataUrl : app + '/Index/Expand'
            })
        }) ;
        node_div='node-div';
        this.on('click' , menuClickAction , this) ;
				
    } 
		    
}) ;

ModulesPanel = Ext.extend(Ext.tree.TreePanel , {

    managerroot : null ,
    loadMask : null ,
    constructor : function(){

        var root = new Ext.tree.AsyncTreeNode({
            id : 'modules' ,
            text : '管理目录' ,
            draggable : false
        }) ;
		
        ModulesPanel.superclass.constructor.call(this , {

            id : 'modules-menu' ,
            autoScroll : true ,
            enableDD : false ,//是否支持拖拽效果
            containerScroll : true ,//是否支持滚动条
            //split : true ,
            root : root ,
            rootVisible : false ,//是否显示跟节点
            collapseMode : 'mini' ,//在分割线处出现按钮
            hideCollapseTool  :true ,
            lines : false ,
            border : false ,
            collapsible : true ,
            //margins : '0 0 5 5' ,
            loader : new Ext.tree.TreeLoader({
                dataUrl : app + '/Index/Expand'
            })
        }) ;
        node_div='node-div';
        this.on('click' , menuClickAction , this) ;
				
    } 
		    
}) ;
AccountMenuPanel = Ext.extend(Ext.tree.TreePanel , {

    managerroot : null ,
    loadMask : null ,
    constructor : function(){

        var root = new Ext.tree.AsyncTreeNode({
            id : 'menu' ,
            text : '管理目录' ,
            draggable : false
        }) ;
		
        AccountMenuPanel.superclass.constructor.call(this , {

            id : 'adminmanager-menu' ,
            autoScroll : true ,
            enableDD : false ,//是否支持拖拽效果
            containerScroll : true ,//是否支持滚动条
            //split : true ,
            root : root ,
            rootVisible : false ,//是否显示跟节点
            collapseMode : 'mini' ,//在分割线处出现按钮
            hideCollapseTool  :true ,
            lines : false ,
            border : false ,
            collapsible : true ,
            //margins : '0 0 5 5' ,
            loader : new Ext.tree.TreeLoader({
                dataUrl : app + '/Index/Expand'
            })
        }) ;
        menu_div_tip= 'menu-div'
        this.on('click' , menuClickAction , this) ;
				
    } 
}) ;

var node_pid='';
var item_pid='';
menuClickAction = function(_node){
    if(!_node.isLeaf() || _node.id== 'nologin' || _node.id == 'nopower'){
        return false;
    }
    var main = Ext.getCmp('defaultpanel') ;

    var tabId = 'tab-' + _node.id;
    var tabTitle = _node.text;
    var tablink = _node.attributes.layoutpath;
    //    node_div = tablink;
    //    node_div_tip= 'node-div';
    var tabJsArray = Ext.util.JSON.decode(_node.attributes.jspath);	//得到js文件存放的路径
    var tabiconcls = _node.attributes.iconcls;
    var tab = main.getComponent(tabId);	//得到tab组建(由id或索引直接返回容器的子组件)
    if(!tab){
        tab = main.add(
            new Ext.Panel({
                id : tabId ,
                title : tabTitle ,
                autoScroll : true ,
                layout : 'fit' ,
                border : false ,
                closable : true ,
                iconCls :tabiconcls
            })
            );
        main.setActiveTab(tab);
        var loadmask = new Ext.LoadMask(main.body , {
            msg:"页面加载中……"
        }) ;
        var model;
        loadmask.show() ;
        tab.load({
            url: tablink,
            callback:function(a,b,c){
                var jsStr = "";//创建一个空字符串，用来装载接受的js文件内容
                var num = tabJsArray.length;
                for(var i=0;i<num;i++){

                    var tabjs = tabJsArray[i].js;//取得数组中的js文件
                    var currentIndex = i;//获取当前js文件的索引
                    Ext.Ajax.request({
                        method:'POST',//为了不丢失js文件内容，所以要选择post的方式加载js文件
                        url: app + '/Load/LoadJsFile',
                        params : {
                            jspath:tabjs
                        } ,
                        scope: this,
                        success: function(response){
 
                            jsStr+=response.responseText;//把每次加载的内容都存入jsStr中

                            if(currentIndex==num-1){//如果当前索引号为最后一个时开始创建应用的实例
                                //获取模块类
                                this[_node.id] = eval(jsStr);
                                //实例化模块类
                                model = new this[_node.id]();
                                loadmask.hide();
                            }
                            tab.on('destroy',function(){
                                model.destroy();
                            });    
                        },
                        failure:function(response){
                            Ext.Msg.show({
                                title: "错误信息",
                                msg:"加载页面核心文件时发生错误！",
                                buttons:Ext.MessageBox.OK,
                                icon: Ext.MessageBox.ERROR
                            });
                            loadmask.hide();
                        }
                    });
                }
                if(b==false){
                    Ext.Msg.show({
                        title: "错误信息",
                        msg:"加载页面超时或是页面连接不正确！",
                        buttons:Ext.MessageBox.OK,
                        icon: Ext.MessageBox.ERROR
                    });
                    loadmask.hide();
                }
            
            },
            discardUrl: false,
            nocache: true,
            text: "",
            timeout: 3000,//超时时间30ms
            scripts: true
        });
    }
    else{
        main.setActiveTab(tab);
    }
};
getStore=  Ext.extend(Ext.goods.CrudPanel, { 
    constructor: function(id,obj){
        
    }
});
menuItemClickAction = function (id,obj){
    //      var panel=Ext.getCmp("gridPanel"+node_div_tip);
    //                    var record = panel.gridPanel.getSelectionModel().getSelected();//获取选择的记录集
    //                var id = record.get("id");
    var record = Ext.get(obj);//获取选择的记录集
    node_pid=id;             
    
    var type  =  obj.parentNode.parentNode.previousSibling.previousSibling.firstChild.innerHTML;
   
    //获取选择的记录集
      
    var _node={
        id:id,
        text:type,
        type:type,
        attributes:{
            
            jspath:"[{'js':'Admin/Tpl/default/Public/Module/Menu/menu_item.js'}]"
        }
        ,
        isLeaf:'true'
    };
    var tabId = 'tab-menuitenm-' + _node.id;
    node_div= 'menuitenm-' + _node.id;
    var tabTitle = _node.text;
    var tablink = _node.attributes.layoutpath;
    
    var tabJsArray = Ext.util.JSON.decode(_node.attributes.jspath);	//得到js文件存放的路径
    var tabiconcls = _node.attributes.iconcls;
    var tab = main.getComponent(tabId);	//得到tab组建(由id或索引直接返回容器的子组件)
    if(!tab){
 
        tab = main.add(
            new Ext.Panel({
                id : tabId ,
                title : tabTitle ,
                autoScroll : true ,
                layout : 'fit' ,
                border : false ,
                closable : true ,
                iconCls :tabiconcls,
                html:'<div id='+node_div+'></div>'
            })
            );
        main.setActiveTab(tab);
        var loadmask = new Ext.LoadMask(main.body , {
            msg:"页面加载中……"
        }) ;
        var model;
        loadmask.show() ;
        //        tab.load({
        //            url: tablink,
        //            callback:function(a,b,c){
        var jsStr = "";//创建一个空字符串，用来装载接受的js文件内容
        var num = tabJsArray.length;
        for(var i=0;i<num;i++){

            var tabjs = tabJsArray[i].js;//取得数组中的js文件
            var currentIndex = i;//获取当前js文件的索引
            Ext.Ajax.request({
                method:'POST',//为了不丢失js文件内容，所以要选择post的方式加载js文件
                url: app + '/Load/LoadJsFile',
                params : {
                    jspath:tabjs
                } ,
                scope: this,
                success: function(response){
 
                    jsStr+=response.responseText;//把每次加载的内容都存入jsStr中

                    if(currentIndex==num-1){//如果当前索引号为最后一个时开始创建应用的实例
                        //获取模块类
                        this[_node.id] = eval(jsStr);
                        //实例化模块类
                        model = new this[_node.id]();
                        tab.add(model);
                        loadmask.hide();
                    }
                    tab.on('destroy',function(){
                        model.destroy();
                    });    
                },
                failure:function(response){
                    Ext.Msg.show({
                        title: "错误信息",
                        msg:"加载页面核心文件时发生错误！",
                        buttons:Ext.MessageBox.OK,
                        icon: Ext.MessageBox.ERROR
                    });
                    loadmask.hide();
                }
            });
        }
    }
    else{
        main.setActiveTab(tab);
    }
   
}
 
var node = false;
nodeClickAction = function (id,obj){
    //      var panel=Ext.getCmp("gridPanel"+node_div_tip);
    //                    var record = panel.gridPanel.getSelectionModel().getSelected();//获取选择的记录集
    //                var id = record.get("id");
    var record = Ext.get(obj);//获取选择的记录集
    node_pid=id;               
    var type  =  obj.parentNode.parentNode.nextSibling.nextSibling.nextSibling.firstChild.innerHTML;
    var text=obj.parentNode.parentNode.nextSibling.nextSibling.firstChild.innerHTML+'-'+type;
    
    if(type == '控制器'){
        node =true;
    }
    //获取选择的记录集
    var _node={
        id:id,
        text:text,
        type:type,
        attributes:{
            
            jspath:"[{'js':'Admin/Tpl/default/Public/Module/User/node.js'}]"
        }
        ,
        isLeaf:'true'
    };
    var tabId = 'tab-node-' + _node.id;
    node_div= 'node-' + _node.id;
    var tabTitle = _node.text;
    var tablink = _node.attributes.layoutpath;
    
    var tabJsArray = Ext.util.JSON.decode(_node.attributes.jspath);	//得到js文件存放的路径
    var tabiconcls = _node.attributes.iconcls;
    var tab = main.getComponent(tabId);	//得到tab组建(由id或索引直接返回容器的子组件)
    if(!tab){
 
        tab = main.add(
            new Ext.Panel({
                id : tabId ,
                title : tabTitle ,
                autoScroll : true ,
                layout : 'fit' ,
                border : false ,
                closable : true ,
                iconCls :tabiconcls,
                html:'<div id='+node_div+'></div>'
            })
            );
        main.setActiveTab(tab);
        var loadmask = new Ext.LoadMask(main.body , {
            msg:"页面加载中……"
        }) ;
        var model;
        loadmask.show() ;
        //        tab.load({
        //            url: tablink,
        //            callback:function(a,b,c){
        var jsStr = "";//创建一个空字符串，用来装载接受的js文件内容
        var num = tabJsArray.length;
        for(var i=0;i<num;i++){

            var tabjs = tabJsArray[i].js;//取得数组中的js文件
            var currentIndex = i;//获取当前js文件的索引
            Ext.Ajax.request({
                method:'POST',//为了不丢失js文件内容，所以要选择post的方式加载js文件
                url: app + '/Load/LoadJsFile',
                params : {
                    jspath:tabjs
                } ,
                scope: this,
                success: function(response){
 
                    jsStr+=response.responseText;//把每次加载的内容都存入jsStr中

                    if(currentIndex==num-1){//如果当前索引号为最后一个时开始创建应用的实例
                        //获取模块类
                        this[_node.id] = eval(jsStr);
                        //实例化模块类
                        model = new this[_node.id]();
                        tab.add(model);
                        loadmask.hide();
                    }
                    tab.on('destroy',function(){
                        model.destroy();
                    });    
                },
                failure:function(response){
                    Ext.Msg.show({
                        title: "错误信息",
                        msg:"加载页面核心文件时发生错误！",
                        buttons:Ext.MessageBox.OK,
                        icon: Ext.MessageBox.ERROR
                    });
                    loadmask.hide();
                }
            });
        }
    }
    else{
        main.setActiveTab(tab);
    }
}
var access = false;
access_saveType='应用';
accessClickAction = function (id,saveType,name){
    //      var panel=Ext.getCmp("gridPanel"+node_div_tip);
    //                    var record = panel.gridPanel.getSelectionModel().getSelected();//获取选择的记录集
    //                var id = record.get("id");
    if(saveType=='应用')
    {
        access_rid=id;
    }  
    access_nid = id;
    showType=saveType;
    switch (saveType){
        case '应用':
              
            access_saveType='功能';
            break;
        case '功能':
            access_saveType='控制';
            break;   
        case'控制':
            access=true;
            break;
    };
         
    var text=name+'-'+saveType;
    
        
    //获取选择的记录集
    var _node={
        id:id,
        text:text,
        type:saveType,
        attributes:{
            
            jspath:"[{'js':'Admin/Tpl/default/Public/Module/Access/access.js'}]"
        }
        ,
        isLeaf:'true'
    };
    var tabId = 'tab-access-' +saveType+ _node.id;
    access_div= 'access-' + _node.id;
    var tabTitle = _node.text;
    var tablink = _node.attributes.layoutpath;
    
    var tabJsArray = Ext.util.JSON.decode(_node.attributes.jspath);	//得到js文件存放的路径
    var tabiconcls = _node.attributes.iconcls;
    var tab = main.getComponent(tabId);	//得到tab组建(由id或索引直接返回容器的子组件)
    if(!tab){
 
        tab = main.add(
            new Ext.Panel({
                id : tabId ,
                title : tabTitle ,
                autoScroll : true ,
                layout : 'fit' ,
                border : false ,
                closable : true ,
                iconCls :tabiconcls,
                html:'<div id='+access_div+'></div>'
            })
            );
        main.setActiveTab(tab);
        var loadmask = new Ext.LoadMask(main.body , {
            msg:"页面加载中……"
        }) ;
        var model;
        loadmask.show() ;
        //        tab.load({
        //            url: tablink,
        //            callback:function(a,b,c){
        var jsStr = "";//创建一个空字符串，用来装载接受的js文件内容
        var num = tabJsArray.length;
        for(var i=0;i<num;i++){

            var tabjs = tabJsArray[i].js;//取得数组中的js文件
            var currentIndex = i;//获取当前js文件的索引
            Ext.Ajax.request({
                method:'POST',//为了不丢失js文件内容，所以要选择post的方式加载js文件
                url: app + '/Load/LoadJsFile',
                params : {
                    jspath:tabjs
                } ,
                scope: this,
                success: function(response){
 
                    jsStr+=response.responseText;//把每次加载的内容都存入jsStr中

                    if(currentIndex==num-1){//如果当前索引号为最后一个时开始创建应用的实例
                        //获取模块类
                        this[_node.id] = eval(jsStr);
                        //实例化模块类
                        model = new this[_node.id]();
                                                 
                        tab.add(model);
                        loadmask.hide();
                    }
                    tab.on('destroy',function(){
                        model.destroy();
                    });    
                },
                failure:function(response){
                    Ext.Msg.show({
                        title: "错误信息",
                        msg:"加载页面核心文件时发生错误！",
                        buttons:Ext.MessageBox.OK,
                        icon: Ext.MessageBox.ERROR
                    });
                    loadmask.hide();
                }
            });
        }
    }
    else{
        main.setActiveTab(tab);
    }
}
allClickAction = function(_node){
    
    switch  (_node.type){
        case '项目权限':
            node = 'node_1';
            break;
        case '控制器':
            node = 'node_1_1';
            break;
        case '操作动作':
            node = 'node_1_1_1';
            
            break;
    }
    
    var tabId = 'tab-detail-' + _node.id;
    var tabTitle = _node.text;
    var tablink = _node.attributes.layoutpath;
    node_div = '/tp17/Admin/Tpl/default/Public/Layout/'+node+'.html';
    node_div_tip = node+'-div';
    var tabJsArray = Ext.util.JSON.decode(_node.attributes.jspath);	//得到js文件存放的路径
    var tabiconcls = _node.attributes.iconcls;
    var tab = main.getComponent(tabId);	//得到tab组建(由id或索引直接返回容器的子组件)
    if(!tab){
        tab = main.add(
            new Ext.Panel({
                id : tabId ,
                title : tabTitle ,
                autoScroll : true ,
                layout : 'fit' ,
                border : false ,
                closable : true ,
                iconCls :tabiconcls
            })
            );
        main.setActiveTab(tab);
        var loadmask = new Ext.LoadMask(main.body , {
            msg:"页面加载中……"
        }) ;
        var model;
        loadmask.show() ;
        tab.load({
            url: node_div,
            callback:function(a,b,c){
                var jsStr = "";//创建一个空字符串，用来装载接受的js文件内容
                var num = tabJsArray.length;
                for(var i=0;i<num;i++){

                    var tabjs = tabJsArray[i].js;//取得数组中的js文件
                    var currentIndex = i;//获取当前js文件的索引
                    Ext.Ajax.request({
                        method:'POST',//为了不丢失js文件内容，所以要选择post的方式加载js文件
                        url: app + '/Load/LoadJsFile',
                        params : {
                            jspath:tabjs
                        } ,
                        scope: this,
                        success: function(response){

                            jsStr+=response.responseText;//把每次加载的内容都存入jsStr中

                            if(currentIndex==num-1){//如果当前索引号为最后一个时开始创建应用的实例
                                //获取模块类
                                this[_node.id] = eval(jsStr);
                                //实例化模块类
                                model = new this[_node.id]();
                                loadmask.hide();
                            }
                            tab.on('destroy',function(){
                                model.destroy();
                            });
                        },
                        failure:function(response){
                            Ext.Msg.show({
                                title: "错误信息",
                                msg:"加载页面核心文件时发生错误！",
                                buttons:Ext.MessageBox.OK,
                                icon: Ext.MessageBox.ERROR
                            });
                            loadmask.hide();
                        }
                    });
                }
                if(b==false){
                    Ext.Msg.show({
                        title: "错误信息",
                        msg:"加载页面超时或是页面连接不正确！",
                        buttons:Ext.MessageBox.OK,
                        icon: Ext.MessageBox.ERROR
                    });
                    loadmask.hide();
                }
            },
            discardUrl: false,
            nocache: true,
            text: "",
            timeout: 3000,//超时时间30ms
            scripts: true
        });
    }
    else{
        main.setActiveTab(tab);
    }
};
 
 