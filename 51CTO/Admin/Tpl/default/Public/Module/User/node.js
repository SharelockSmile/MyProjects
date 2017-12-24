NodePanel = Ext.extend(Ext.goods.CrudPanel, {

    baseUrl: app + '/Node',
    storeMapping: ["name","title","status","remark","id"],
    ID: 'id',
    render_div:node_div,
    toolbar : {},
//    check:true,
    mark : 1 ,
    addtooltip : "添加新会员" ,
    pid:node_pid,
    rid:'',
    //    modifytooltip : "修改已选定的会员信息" ,
    //    deletetooltip : "删除已选定的会员" ,
    refreshtooltip : "刷新" ,
    //    addtitle : "添加新的会员" ,
    //    modifytitle : "修改货物会员" ,
                
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
                name:"name",
                fieldLabel:"<font color=red>功能名称</font>",
                allowBlank:false,
                blankText:"功能名称不允许为空",
                readOnly:false
            },
            {
                name:"remark",
                fieldLabel:"<font color=red>功能标识</font>",
                allowBlank:false,
                blankText:"功能标识不允许为空",
                readOnly:false 
            }, 
            {
                xtype: 'fieldset',
                name:"status",
                fieldLabel:"<font color=red>启用</font>", 
                autoHeight:true,
                defaultType: 'radio',
                hideLabels: true,
                layout:'column',
                items: [
                {
                    boxLabel: '是', 
                    name: 'status', 
                    inputValue: '1', 
                    checked: true
                },

                {
                    boxLabel: '否', 
                    name: 'status', 
                    inputValue: '0'
                } 
                ]
            },
            {
                name:"remark",
                fieldLabel:"<font color=red>功能描述</font>",
                allowBlank:false,
                blankText:"功能描述不允许为空",
                readOnly:false 
            },{
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
        this.operationRender=function(obj,a){
            if(node){
                return obj;
            }
            return "<b onclick='javascript:nodeClickAction("+obj+",this)' style='cursor:pointer'>"+obj+"</b>";
        };
        this.sm = '';
        this.cm = new Ext.grid.ColumnModel([
            new Ext.grid.RowNumberer(),//获得行号
            {
                header:"&nbsp;&nbsp;<font color=red>功能名称</font>",
                tooltip:"功能名称",     
                dataIndex:'title',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false
            },     
            {
                header:"&nbsp;&nbsp;<font color=red>查看下级权限</font>",
                tooltip:"查看",     
                dataIndex:'id',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false,
                renderer:this.operationRender
            }, 
            {
                header:"&nbsp;&nbsp;<font color=red>启用</font>",
                     
                dataIndex:'status',
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
                header:"&nbsp;&nbsp;<font color=red>功能标识</font>",
                     
                dataIndex:'name',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false
	            
            }
            ,
            {
                header:"&nbsp;&nbsp;<font color=red>功能描述</font>",
                     
                dataIndex:'remark',
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
	         
        NodePanel.superclass.constructor.call(this);
        
    } ,
    onGetGrid : function(){
        return this.gridPanel;
    }
});
 