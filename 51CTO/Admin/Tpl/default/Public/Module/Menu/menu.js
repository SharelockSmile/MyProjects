MenuPanel = Ext.extend(Ext.goods.CrudPanel, {
     
        baseUrl: app + '/Menu',				
        storeMapping: ["id","title","menutype","description"],
        ID: 'id',
        render_div:menu_div_tip,
        toolbar : {},
        //    check:true,
        mark : 1 ,
        addtooltip : "添加新会员" ,
        pid:node_pid,
        //    modifytooltip : "修改已选定的会员信息" ,
        //    deletetooltip : "删除已选定的会员" ,
        refreshtooltip : "刷新" ,
        //    addtitle : "添加新的会员" ,
        //    modifytitle : "修改货物会员" ,
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
                                name:"title",
                                fieldLabel:"<font color=red>菜单标题</font>",
                                allowBlank:false,
                                blankText:"",
                                readOnly:false
                        },
                        {
                                name:"menutype",
                                fieldLabel:"<font color=red>菜单类型</font>",
                                allowBlank:false,
                                blankText:"",
                                readOnly:false 
                        },
             
                        {
                                name:"description",
                                fieldLabel:"<font color=red>菜单描述</font>",
                                allowBlank:false,
                                blankText:"",
                                readOnly:false 
                        }]
                });
			
                return formPanel;
        },
        createWin: function(status){
                return this.initWin(345, 300, status);
        },

 
        constructor: function(){
                this.operationRender=function(obj,a){
                        if(node == 'node_1_1'){
                                return obj;
                        }
                        return "<b onclick='javascript:menuItemClickAction("+obj+",this)' style='cursor:pointer'>"+'查看'+"</b>";
                };
                this.sm = '';
                this.cm = new Ext.grid.ColumnModel([
                        new Ext.grid.RowNumberer(),//获得行号
                        {
                                header:"&nbsp;&nbsp;<font color=red>菜单标题</font>",
                                tooltip:"菜单标题",     
                                dataIndex:'title',
                                menuDisabled : false,
                                align:'left',
                                width:10,
                                resizable:false
                        },     
                        {
                                header:"&nbsp;&nbsp;<font color=red>菜单类型</font>",
                                tooltip:"菜单类型",     
                                dataIndex:'menutype',
                                menuDisabled : false,
                                align:'left',
                                width:10,
                                resizable:false
                        } ,
{
                                header:"&nbsp;&nbsp;<font color=red>菜单项</font>",
                                tooltip:"菜单项",     
                                dataIndex:'id',
                                menuDisabled : false,
                                align:'left',
                                width:10,
                                resizable:false,
                                renderer:this.operationRender
                        } 
                        ,
                        {
                                header:"&nbsp;&nbsp;<font color=red>菜单描述</font>",
                     
                                dataIndex:'description',
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
	         
                MenuPanel.superclass.constructor.call(this);
        
        } ,
        onGetGrid : function(){
                return this.gridPanel;
        }
});
 