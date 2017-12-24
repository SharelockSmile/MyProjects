/**
 * 定义命名空间
 */
Ext.namespace("Ext.goods");

/*
 *CRUD面板基类,继承自EXT的Panel
 */
Ext.goods.CrudPanel = Ext.extend(Ext.Panel, {
    
        /**
     *基本属性
     */
 
        gridPanel:null,
        //    gridPanelId: 'gridPanel' + this.ID,
        gridViewConfig: {},
        cm: new Ext.grid.CheckboxSelectionModel(),
        sm: new Ext.grid.RowSelectionModel({
                dataIndex: this.ID ,
                singleSelect : true
        }),//-列选择模式
        store: null,
        storeMapping: null,
        pageSize: 5,
        toolbar : {} ,
        selflisteners : {},
        mark : 1 ,
        check:false,
        addtooltip : "" ,
        modifytooltip : "" ,
        deletetooltip : "" ,
        refreshtooltip : "" ,
        addtitle : "添加" ,
        modifytitle : "修改" ,
        render_div : null ,
        pid:'',
        baseUrl: null,
        nodblclick : 0 ,
        saveType:'',
        acType:'',
        //width: 800,
        //height: 600,
 
        ids:'',
        //构造器
        constructor: function(config){
               
                var flag = this.store == null;
                if(flag){
                        this.store = new Ext.data.JsonStore({
                                id: this.ID,
                
                                url: this.baseUrl + "/ListAll",//默认的数据源地址，继承时需要提供
                                root: "data",
                                totalProperty: "totalCount",
                                remoteSort: true,
                                fields: this.storeMapping
                        });
                } 
        
                this.cm.defaultSortable = true;
        
                var viewConfig = Ext.apply({
                        forceFit: true,
                        emptyText:'对不起,没有搜索到你想要的数据,请扩大搜索范围!'  
                }, this.gridViewConfig);
		
                var originaltoolbar = '';
                var checktool= {
                        text: '查看',
                        iconCls: 'refresh',
                        tooltip: this.refreshtooltip,
                        handler: this.checkdetail,
                        scope: this
                };
                if(this.mark == 1){
                        originaltoolbar = [{
                                id: 'addButton',
                                text: '添加',
                                iconCls: 'add',
                                tooltip: this.addtooltip,
                                handler: this.create,
                                scope: this
                        }, '-',{
                                id: 'editButton',
                                text: '编辑',
                                iconCls: 'modify',
                                tooltip: this.modifytooltip,
                                handler: this.onEdit,
                                scope: this
                        }, '-', {
                                text: '删除',
                                iconCls: 'delete',
                                tooltip: this.deletetooltip,
                                handler: this.onRemove,
                                scope: this
                        }, '-', {
                                text: '刷新',
                                iconCls: 'refresh',
                                tooltip: this.refreshtooltip,
                                handler: this.onRefresh,
                                scope: this
                        }];	
        
                }
                if(this.check){
                        originaltoolbar.push('-');
                        originaltoolbar.push(checktool);
                }
                if(!this.nodblclick){
                        this.listeners = {
                                'celldblclick': {//双击时执行修改
                                        fn: this.onEdit,
                                        scope: this
                                },
                                'contextmenu':function(e) {
                                        e.stopEvent();
                                }
                        };
                        if(this.selflisteners != null)
                                Ext.apply(this.listeners,this.selflisteners);
                }
                else{
                        this.listeners = {
                                'contextmenu':function(e) {
                                        e.stopEvent();
                                }
                        };	
                }
                this.gridPanel = new Ext.grid.GridPanel({
             
                        store: this.store,
                        cm: this.cm,
                        sm: this.sm,
                        trackMouseOver: true,
                        stripeRows: true,
                        loadMask: true,
                        autoHeight : true ,
                        //超过长度带自动滚动条
                        autoScroll:true,
                        border:false,
                        collapsible: true,
                        animCollapse: false,
                        enableColumnMove : false,
                        viewConfig: viewConfig,
                        listeners: this.listeners,
                        tbar: [originaltoolbar,this.toolbar,'->',
                        '查询：',new Ext.app.SearchField({
                                width:150,
                                store: this.store,
                                paramName: 'searchstring'
                        })],
                        //分页
                        bbar: new Ext.PagingToolbar({
                                pageSize: this.pageSize,
                                store: this.store,
                                displayInfo: true,
                                displayMsg: '显示第 {0} 条到 {1} 条记录，一共 {2} 条',
                                emptyMsg: "没有记录"
                        })
                });
        
                if(this.view){
                        Ext.apply(this.gridPanel,{
                                view: this.view
                        });
                }
                if(this.saveType!='')
                {
                        this.store.load({
                                params: {
                                        start: 0,
                                        limit: 10,
                                        id:this.pid,
                                        saveType:this.saveType,
                                        rid:this.rid,
                                        nid:this.nid
                                }
                        });
                }else{
                        this.store.load({
                                params: {
                                        start: 0,
                                        limit: 10,
                                        id:this.pid
                                }
                        });
                }
        
                var configs = Ext.apply({
                        closable: true,
                        autoScroll: true,
                        border : false ,
                        layout: "fit",
                        renderTo : this.render_div,
                        items:[this.gridPanel],
                        /**
             *渲染数据
             */
                        //链接
                        linkRenderer: function(v){
                                if (!v) 
                                        return "";
                                else 
                                        return String.format("<a href='{0}' target='_blank'>{0}</a>", v);
                        },
                        //时间
                        dateRender: function(format){
                                format = format || "Y-m-d h:i";
                                return Ext.util.Format.dateRenderer(format);
                        }
                },config);
        
                //调用父类的构造器
                Ext.goods.CrudPanel.superclass.constructor.call(this,configs);
        },
       
       
        /**
     *事件
     */
      
        //刷新
        onRefresh: function(){
                this.store.removeAll();
                this.store.reload();
        },
        //初始化窗口（用于新增，修改时）,继承后在createWin中调用该方法显示窗口
        initWin: function(width, height, status,name){
                var obj =this;
                if(name!='授权项目')
                        name='保存';
                var db=new Ext.Button({//取消项目
                        text: "取消项目授权",
                        handler: function(){
                                this.acType='cancelp'
                        },
                        scope: this
                });  
                var dcb=new Ext.Button({//取消c ctrol
                        text: "取消控制器授权",
                        handler:  function(){
                                obj.c1.disable();
                                obj.c2.disable();
                                obj.DelAccess
                        },
                        scope: this
                });
                var dab=new Ext.Button({//取消a ction
                        text: "取消方法授权",
                        handler:  function(){
                                obj.c2.disable();
                                obj.c3.disable();
                                obj.DelAccess
                        },
                        scope: this
                });
                
                var b = new Ext.Button({
                        text: name,
                        listeners:{//添加监听事件 可以结合handler测试这两个事件哪个最先执行  
                                "click":function(){  
                                        obj.onSave
                                }
                        }
                });   
        var cb=new Ext.Button({
                text: "授权控制器",
                listeners:{//添加监听事件 可以结合handler测试这两个事件哪个最先执行  
                        "click":function(){  
                                alert(RoleClickPanel.addtitle);  
                        }  
                },
                scope: this
        });
        var ab=new Ext.Button({
                text: "授权方法",
                handler: function(){
                        obj.c2.disable();
                        obj.c3.disable();
                        obj.onSave
                },
                scope: this
        });        
        if(name!='授权项目')
        {
                b = new Ext.Button({
                        text: name,
                        handler: this.onSave ,
                        scope: this
                });      
                db.hide();
                dab.hide();
                dcb.hide();
                cb.hide();
                ab.hide();
        }
        var win = new Ext.Window({
                title: status,
                width: width,
                height: height,
                modal: true,
                shadow: true,
                iconCls:status,
                //不可以随意改变大小
                resizable:false,
                //是否可以拖动
                draggable:false,
                defaultType:"textfield",
                labelWidth:100,
                collapsible:true, //允许缩放条
                closeAction : 'hide',
                closable:false,
                plain : true,
                //弹出模态窗体
                modal: 'true', 
                buttonAlign:"center",
                bodyStyle:"padding:10px 0 0 15px",
                /*
			listeners:{
			    "show":function() {
			        //当window show事件发生时清空一下表单
			        //this.fp.getForm().loadRecord(row);
			    }
			},*/

                items: [this.fp],
                buttons: [b,cb,ab,db,dcb,dab,{
                        text: "关闭",
                        handler: this.closeWin_noreload,
                        scope: this
                }]
        });
        return win;
},
    
//显示（新增/修改）窗口
showWin: function(status){ //createForm()需要在继承时提供，该方法作用是创建表单
        if (!this.win) {
                if (!this.fp) {
                        this.fp = this.createForm(status);
                }
                this.win = this.createWin();
                if(status == 'add'){
                        this.win.setTitle(this.addtitle) ;
                        this.win.setIconClass('grid-win-addicon');
                }
                else if(status == 'save'){
                        this.win.setTitle(this.modifytitle) ;
                        this.win.setIconClass('grid-win-modifyicon');
                }
                else if (status == 'import'){
                        this.win.setIconClass('product-second');
                        this.win.setTitle('二次进货');	
                }
        /*this.win.on("close", function(){
                this.win = null;
                this.fp = null;
                this.store.reload();
            }, this);*/
        }
        //窗口关闭时，数据重新加载
        this.win.show();
},
//创建（新增/修改）窗口
create: function(){
        this.showWin("add");
        this.reset();
},
rscreate: function(){
        this.showWin("rs");
        this.reset();
},
DelAccess: function(type){
                
                
        if(this.fp.form.isValid()){
                ;
                var url=this.baseUrl + "/DelAccess";
                if(this.saveType!='')
                        url=this.baseUrl+'/'+this.saveType;
                this.fp.form.submit({
                        waitMsg: '正在保存。。。',
                        url: url,
                        method: 'POST',
                        success: function(){
                                this.closeWin_noreload();
                                this.store.reload();
                        },
                        failure:function(form,action) {
                                Ext.Msg.show({
                                        title: "错误信息",
                                        msg:"命名重复",
                                        buttons:Ext.MessageBox.OK,
                                        icon: Ext.MessageBox.ERROR
                                });
                        },
                        scope: this
                });
        }
},
//数据保存[（新增/修改）窗口]
onSave: function(type){
                
        var id = this.fp.form.findField("id").getValue();
        if(this.fp.form.isValid()){
                if("" !=this.ids){
                        this.ids.disable();
                }        ;
                var url=this.baseUrl + "/" + (id ? "Save" : "Add");
                if(this.saveType!='')
                        url=this.baseUrl+"/" +this.saveType;
                this.fp.form.submit({
                        waitMsg: '正在保存。。。',
                        url: url,
                        method: 'POST',
                        success: function(){
                               
                                this.closeWin_noreload();
                                this.store.reload();
                        },
                        failure:function(form,action) {
                               
                                Ext.Msg.show({
                                        title: "错误信息",
                                        msg:"命名重复",
                                        buttons:Ext.MessageBox.OK,
                                        icon: Ext.MessageBox.ERROR
                                });
                        },
                        scope: this
                });
        }
},
//（新增/修改）窗口上的清空
reset: function(){
        if (this.win) 
                this.fp.form.reset();
},
//（新增/修改）窗口上的关闭
closeWin: function(){
        if (this.win) 
                this.win.close();
        this.win = null;
        this.fp = null;
        this.store.reload();
},
closeWin_noreload : function(){
        if (this.win) 
                this.win.close();
        this.win = null;
        this.fp = null;
} ,
//修改，双击行，或选中一行点击修改，
onEdit: function(){
        if (this.gridPanel.selModel.hasSelection()) {
                var records = this.gridPanel.selModel.getSelections();//得到被选择的行的数组
                var recordsLen = records.length;//得到行数组的长度
                if (recordsLen > 1) {
                        Ext.Msg.alert("系统提示信息", "请选择其中一项进行编辑！");
                }//一次只给编辑一行
                else {
                        var record = this.gridPanel.getSelectionModel().getSelected();//获取选择的记录集
                        var id = record.get("id");
                        if(id != ''){
                                this.showWin("save");
                                this.pid=id;
                    
                                this.fp.form.loadRecord(record); //往表单（fp.form）加载数据
                        }
                }
        }
        else {
                Ext.Msg.alert("提示", "请先选择要编辑的行!");
        }
},
checkdetail: function(){
        if (this.gridPanel.selModel.hasSelection()) {
                var records = this.gridPanel.selModel.getSelections();//得到被选择的行的数组
                var recordsLen = records.length;//得到行数组的长度
                if (recordsLen > 1) {
                        Ext.Msg.alert("系统提示信息", "请选择其中一项进行编辑！");
                }//一次只给编辑一行
                else {
                        var record = this.gridPanel.getSelectionModel().getSelected();//获取选择的记录集
                        var id = record.get("id");
                        var name = record.get("name");
                        if(id != ''){
                                Ext.Ajax.request({
                                        method:'POST',
                                        params:{
                                                pid:id,
                                                start: 0,
                                                limit: 10
                                        },
                                        url:'Node/ListAll/',
                                        success:function(response){
                            
                                        }
                                });
                                var obj={
                                        id:id,
                                        text:name
                                };
                        }
                }
        }
        else {
                Ext.Msg.alert("提示", "请先选择要编辑的行!");
        }
},
//删除,deleteIds为主键值
onRemove: function(){
        var store = this.store;
        var baseUrl = this.baseUrl;
        if (this.gridPanel.selModel.hasSelection()) {
                var records = this.gridPanel.selModel.getSelections();//得到被选择的行的数组
                var recordsLen = records.length;//得到行数组的长度
                var deleteIds = "";
                for (var i = 0; i < recordsLen; i++) {
                        var id = records[i].get(this.ID);
                        if(id == '') return;
                        if (i != 0) {
                                deleteIds += "," + id;
                        }
                        else {
                                deleteIds = id;
                        }
                }
            
                Ext.MessageBox.confirm('系统提示信息', '确定要删除所选的记录吗?', function(btn){
                        if (btn == 'yes') {
                                var myCon = new Ext.data.Connection();
                                Ext.MessageBox.wait('正在删除数据中, 请稍候……'); //出现一个等待条
                                myCon.request({
                                        url: baseUrl + '/Remove',
                                        method: "POST",
                                        params: {
                                                'deleteIds': deleteIds
                                        },
                                        //callback : Function (Optional) options, success : Boolean ,response : Object 
                                        callback: function(options, success, response){
                                                Ext.MessageBox.hide();
                                                successmsg = Ext.util.JSON.decode(response.responseText).success;
                                                if (successmsg) {
                                                        Ext.Msg.alert("提示信息", "成功删除数据!", function(){
                                                                store.reload();
                                                        }, this);
                                                }
                                                else {
                                                        error = Ext.util.JSON.decode(response.responseText).error;
                                                        Ext.MessageBox.alert("系统提示信息", error);
                                                }
                                        }
                                }, this);
                        }//if..yes
                }, this);
        }
        else {
                Ext.Msg.alert("提示", "请先选择要删除的行!");
        }
}
});
