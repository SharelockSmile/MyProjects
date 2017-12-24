UserPanel = Ext.extend(Ext.goods.CrudPanel, {
        //id: "product-class",
        baseUrl: app + '/User',
        storeMapping: ["name","reg_date","last_login_date","email","pwd","username","id","active"],
        ID: "id",
        render_div:'user-div',
        toolbar : {},
        mark : 1 ,
        addtooltip : "添加新会员" ,
        //    modifytooltip : "修改已选定的会员信息" ,
        deletetooltip : "删除已选定的会员" ,
        refreshtooltip : "刷新" ,
        addtitle : "添加新的会员" ,
        modifytitle : "修改货物会员" ,
        ids:'',             
        createForm: function(){
                var obj = this;
                obj.ids=  new Ext.form.Field({
                        name: "id" 
                });
                obj.ids.hide()
                var formPanel = new Ext.form.FormPanel({
                        plain:true,
                        layout:"form",
                        defaultType:"textfield",
                        labelWidth:65,
                        baseCls:"x-plain",
                        //锚点布局-
                        defaults:{
                                anchor:"90%",
                                msgTarget:"side"
                        },
                        buttonAlign:"center",
                        bodyStyle:"padding:0 0 0 0",
                        monitorValid : true,
                        items:[obj.ids,{
                                name:"username",
                                fieldLabel:"<font color=red>登录名</font>",
                                allowBlank:false,
                                blankText:"登录名不允许为空",
                                readOnly:false
                        },
                        {
                                name:"pwd",
                                fieldLabel:"<font color=red>密码</font>",
                                allowBlank:false,
                                blankText:"密码不允许为空",
                                readOnly:false
                        },{
                                name:"name",
                                fieldLabel:"<font color=red>用户昵称</font>",
                                allowBlank:false,
                                blankText:"用户昵称不允许为空",
                                readOnly:false
                        },{
                                name:"email",
                                fieldLabel:"<font color=red>邮箱</font>",
                                allowBlank:false,
                                blankText:"邮箱不允许为空",
                                readOnly:false,
                                vtype:'email'
                        },
                        {
                                xtype : "combo" ,
                                name:"role",
                                fieldLabel:"<font color=red>会员权限</font>",
                                allowBlank:false,
                                blankText:"会员权限不能为空",
                                readOnly:false ,
                                mode : "remote" ,
                                displayField : "name" ,
                                valueField : "id" ,
                                triggerAction : "all" ,
                                store : new Ext.data.Store({
                                        proxy : new Ext.data.HttpProxy({
                                                url : app + '/User/ListAllForCombo'
                                        }) ,
                                        reader : new Ext.data.JsonReader({
                                                id : "id"
                                        } , [
{
                                                name : "id"
                                        } ,
{
                                                name : "name"
                                        }
                                        ])
                                })	,
                                emptyText : "请选择会员权限" ,
                                hiddenName : "role_id" ,
                                forceSelection : true ,				//必须选择一项
                                editable : false
                        },
                        {
                                xtype: 'fieldset',
                                name:"active",
                                fieldLabel:"<font color=red>是否激活</font>", 
                                autoHeight:true,
                                defaultType: 'radio',
                                hideLabels: true,
                                layout:'column',
                                items: [
                                {
                                        boxLabel: '是', 
                                        name: 'active', 
                                        inputValue: '1', 
                                        checked: true
                                },

                                {
                                        boxLabel: '否', 
                                        name: 'active', 
                                        inputValue: '0'
                                } 
                                ]
                        }]
                });
			
                return formPanel;
        },
        createWin: function(status){
                return this.initWin(345, 300, status);
        },

 
        constructor: function(){
        
                this.sm = '';
                this.cm = new Ext.grid.ColumnModel([
                        new Ext.grid.RowNumberer(),//获得行号
                        {
                                header:"&nbsp;&nbsp;<font color=red>登录名</font>",
                                tooltip:"登录名",     
                                dataIndex:'username',
                                menuDisabled : false,
                                align:'left',
                                width:10,
                                resizable:false 
       
                        },
                        {   
                                dataIndex:'pwd',
                                hidden:true
                        },    
                        {
                                header:"&nbsp;&nbsp;<font color=red>昵称</font>",
                                tooltip:"昵称",
                                dataIndex:"name",
                                sortable:false,
                                menuDisabled : true,
                                align:'left',
                                resizable:false,
                                width:10
                        //renderer:this.onIsNUM
                        },
                        {
                                header:"&nbsp;&nbsp;<font color=red>邮箱</font>",
                                format : "Y-m-d" ,
                                dataIndex:'email',
                                menuDisabled : false,
                                align:'left',
                                width:10,
                                resizable:false
	            
                        },
                        {
                                header:"&nbsp;&nbsp;<font color=red>注册时间</font>",
                                format : "Y-m-d" ,
                                dataIndex:'reg_date',
                                menuDisabled : false,
                                align:'left',
                                width:10,
                                resizable:false
	            
                        },
                        {
                                header:"&nbsp;&nbsp;<font color=red>启用</font>",
                     
                                dataIndex:'active',
                                menuDisabled : false,
                                align:'left',
                                renderer:function(value){
                                        if(value==1){
                                                return "√";
                                        }else{
                                                return "×";
                                        }
                                },
                                width:10,
                                resizable:false
	            
                        },
                        {
                                header:"&nbsp;&nbsp;<font color=red>最后登录时间</font>",
                     
                                dataIndex:'last_login_date',
                                menuDisabled : false,
                                align:'left',
                                width:10,
                                resizable:false
	            
                        },
                        {
                                header:"&nbsp;&nbsp;<font color=red>ID</font>",
                     
                                dataIndex:'id',
                                menuDisabled : false,
                                align:'left',
                                width:10,
                                resizable:false
	            
                        }
                        ]);
	         
                UserPanel.superclass.constructor.call(this);
        
        } ,
        onGetGrid : function(){
                return this.gridPanel;
        }
});