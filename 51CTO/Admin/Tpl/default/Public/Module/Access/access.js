AccessPanel = Ext.extend(Ext.goods.CrudPanel, {

    baseUrl: app + '/Access',
    storeMapping: ["name","title","used","id","saveType"],
    ID: 'id',
    render_div:access_div,
    toolbar : {},
    //    check:true,
    mark : 0 ,
    nodblclick : 1 ,
    addtooltip : "添加新会员" ,
 
    rid:access_rid,
    nid:access_nid,
    saveType:showType ,
    //    modifytooltip : "修改已选定的会员信息" ,
    //    deletetooltip : "删除已选定的会员" ,
    refreshtooltip : "刷新" ,
    addtitle : "添加新的会员" ,
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
    onDelete : function(){
        gridpanel = this.onGetGrid();
        
        var nid = this.onGetIds();
        alert(nid);
        if(nid){
            Ext.Msg.confirm('系统提示','您确定要删除此交易记录吗?',function(_btn){
                if (_btn == 'yes') {
                    Ext.Ajax.request({
                        url : app + '/Trade/DeleteTrade/' ,
                        params : {
                            'nid' : nid
                        } ,
                        success : function(response , opt){
                            gridpanel.store.reload();	
                        } ,
                        failure : function(){
                            alert('异步通讯失败') ;	
                        }				 
                    });
                }
            },this);
        }
        else{
            Ext.Msg.alert('错误', '请选择一条记录查看！');
        }
    },
    onAdd : function(){
        gridpanel = this.onGetGrid();
        var nid = this.onGetWhat('id');
        if(id){
            Ext.Msg.confirm('系统提示','您确定要删除此交易记录吗?',function(_btn){
                if (_btn == 'yes') {
                    Ext.Ajax.request({
                        url : app + '/Access/DeleteTrade/' ,
                        params : {
                            'nid' : nid
                        } ,
                        success : function(response , opt){
                            gridpanel.store.reload();	
                        } ,
                        failure : function(){
                            alert('异步通讯失败') ;	
                        }				 
                    });
                }
            },this);
        }
        else{
            Ext.Msg.alert('错误', '请选择一条记录查看！');
        }
    },
    clickAction : function(v,a,r){
        if(access){
            return '此权限下无子权限';
        }
              
        
        return "<b onclick='javascript:accessClickAction("+r.get('id')+",\""+ access_saveType+"\",\""+r.get('title')+"\")' style='cursor:pointer'>进入"+ access_saveType+"授权</b>";
    },
    constructor: function(){
        this.toolbar = [{
            text: '授权',
            iconCls: 'add',
            tooltip: '授权',
            handler: this.onAdd,
            scope: this
        },{
            text : '取消授权',
            tooltip : '取消授权',
            iconCls : 'delete',
            handler : this.onDelete,
            scope : this
        }];
        
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
                header:"&nbsp;&nbsp;<font color=red>权限名称</font>",
                tooltip:"权限名称",     
                dataIndex:'title',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false
            },     
            {
                header:"&nbsp;&nbsp;<font color=red>授权</font>",
                tooltip:"授权",     
                dataIndex:'id',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false,
                renderer:this.clickAction,
                scope:this
            },
            {
                header:"&nbsp;&nbsp;<font color=red>授权状态</font>",
                tooltip:"授权状态",     
                dataIndex:'used',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false,
                renderer:function(value){
                    if(value==1){
                        return "√";
                    }else{
                        return "×";
                    }
                }
            } ,
{
                header:"&nbsp;&nbsp;<font color=red>功能标识</font>",
                     
                dataIndex:'name',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false
	            
            }
            
            ]);
	         
        AccessPanel.superclass.constructor.call(this);
 
        
    } ,
    onGetIds : function(){
        gridpanel = this.onGetGrid();
        
        if(gridpanel.selModel.hasSelection()){
            var records = gridpanel.selModel.getSelections();//得到被选择的行的数组
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
            return deleteIds;
        }
        else
            return 0;
    },
    onGetGrid : function(){
        return this.gridPanel;
    }
});
 