CategoryPanel = Ext.extend(Ext.goods.CrudPanel, {
    //id: "product-class",
    baseUrl: app + '/Category',
    storeMapping: ["ctitle","calias","cpublished","caccess","sec_name","sid",'id'],
    ID: "id",
    render_div:'category-div',
    toolbar : {},
    mark : 1 ,
    addtooltip : "添加新分类" ,
    //    modifytooltip : "修改已选定的会员信息" ,
    deletetooltip : "删除已选定的分类" ,
    refreshtooltip : "刷新" ,
    addtitle : "添加新的分类" ,
    modifytitle : "修改货物分类" ,
                
   createForm: function(){
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
            items:[{
                name:"ctitle",
                fieldLabel:"<font color=red>标题</font>",
                allowBlank:false,
                blankText:"标题名不允许为空",
                readOnly:false
            },
            {
                name:"calias",
                fieldLabel:"<font color=red>别名</font>",
                allowBlank:false,
                blankText:"别名不允许为空",
                readOnly:false 
            },
            {
                xtype: 'fieldset',
                name:"cpublished",
                fieldLabel:"<font color=red>是否发布</font>", 
                autoHeight:true,
                defaultType: 'radio',
                hideLabels: true,
                layout:'column',
                items: [
                {
                    boxLabel: '是', 
                    name: 'cpublished', 
                    inputValue: '1', 
                    checked: true
                },

                {
                    boxLabel: '否', 
                    name: 'cpublished', 
                    inputValue: '0'
                } 
                ]
            } ,
            {
                xtype : "combo" ,
                name:"caccess",
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
                
                forceSelection : true ,	
                hiddenName : "caccess" , 
                editable : false
            },
            {
                xtype : "combo" ,
                name:"sec_name",
                fieldLabel:"<font color=red>所属单元</font>",
                allowBlank:false,
                blankText:"所属单元不能为空",
                readOnly:false ,
                mode : "remote" ,
                displayField : "title" ,
                valueField : "id" ,
                triggerAction : "all" ,
                store : new Ext.data.Store({
                    proxy : new Ext.data.HttpProxy({
                        url : app + '/Section/ListAllForCombo'
                    }) ,
                    reader : new Ext.data.JsonReader({
                        id : "id"
                    } , [
{
                        name : "id"
                    } ,
{
                        name : "title"
                    }
                    ])
                })	,
                emptyText : "请选择权限" ,
                forceSelection : true ,	
                hiddenName : "sec_name" , 
                editable : false,
                value:'请选择权限'
            }  ,{
                name: "id",
                xtype: "hidden"
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
                header:"&nbsp;&nbsp;<font color=red>标题</font>",
                tooltip:"标题",     
                dataIndex:'ctitle',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            },
            {
                header:"&nbsp;&nbsp;<font color=red>别名</font>",
                tooltip:"别名",     
                dataIndex:'calias',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            }, {
                header:"&nbsp;&nbsp;<font color=red>所属单元</font>",
                tooltip:"所属单元",     
                dataIndex:'sec_name',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            },
            {
                header:"&nbsp;&nbsp;<font color=red>访问级别</font>",
                tooltip:"访问级别",     
                dataIndex:'caccess',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            },
            {
                header:"&nbsp;&nbsp;<font color=red>发布</font>",
                     
                dataIndex:'cpublished',
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
	            
            } ,
            {
                header:"&nbsp;&nbsp;<font color=red>ID</font>",
                     
                dataIndex:'id',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false
	            
            }
            ]);
	         
        CategoryPanel.superclass.constructor.call(this);
        
    } ,
    onGetGrid : function(){
        return this.gridPanel;
    }
});