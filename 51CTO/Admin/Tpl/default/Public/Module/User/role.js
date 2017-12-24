RolePanel = Ext.extend(Ext.goods.CrudPanel, {
    //id: "product-class",
    baseUrl: app + '/Role',
    storeMapping: ["name","status","remark","id",'saveType'],
    ID: "id",
    render_div:'role-div',
    toolbar : {},
    
    rid:'',
    //        addtooltip : "添加新会员" ,
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
                fieldLabel:"<font color=red>会员分组名称</font>",
                allowBlank:false,
                blankText:"会员分组名称不允许为空",
                readOnly:false
            },
            {
                name:"remark",
                fieldLabel:"<font color=red>描述</font>",
                allowBlank:false,
                blankText:"描述不允许为空",
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
    clickAction : function(v,a,r){
        if(access){
            return obj;
        }
         
        return "<b onclick='javascript:accessClickAction("+r.get('id')+",\"应用\",\""+r.get('name')+"\")' style='cursor:pointer'>"+r.get('name')+"</b>";
    },
    onGetWhat : function(what){
        gridpanel = this.onGetGrid();
        if(gridpanel.selModel.hasSelection()){
            var record = gridpanel.selModel. getSelected().get(what);
            return record;
        }
        else
            return 0;
    },
    accessClick:function(){
        var rid=this.onGetWhat('id');
        var nid;
        var obj = this
        var cm = new Ext.grid.ColumnModel([  
        {
            header:'id',
            dataIndex:'id',
            menuDisabled:true
        },{
            header:'权限',
            dataIndex:'name',
            menuDisabled:true
        },  

        {
            header:'别名',
            dataIndex:'title',
            menuDisabled:true
        },  

        {
            header:'授权状态',
            dataIndex:'used',
            menuDisabled:true
        }   
        ]);  

 
                     

        var store1 = new Ext.data.Store({  
            proxy: new Ext.data.HttpProxy({
                url:app + '/Role/RoleApp/rid/'+rid
            }), 
                                
            reader: new Ext.data.JsonReader({  
                totalProperty: 'totalCount',  
                root: 'data',  
                id:'id'  
            }, [  
            {
                name: 'id', 
                type: 'int'
            },  

            {
                name: 'name', 
                type: 'string'
            },  

            {
                name: 'title', 
                type: 'string'
            },  

            {
                name: 'used', 
                type: 'string'
            }  
            ]),  
            baseParams:{  
                start:0,
                limit:10  
            }  
        });   
                      
        var store2 = new Ext.data.Store({
            data:[],
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
        });
        var store3= new Ext.data.Store({
            data:[],
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
        });
        var c3 = new Ext.ux.form.LovCombo({  
            //                        renderTo:'combox-panel-grid',
            typeAhead : true,  
            fieldLabel : '方法',  
            hiddenName : 'actionid',  
            triggerAction : 'all',  
            lazyRender : true,  
            width:300,  
            displayField:'name',  
            valueField:'id',  
            store:store3,  
            mode :"remote" ,  
                                
            allowBlank : false,  
            emptyText:'请选择...',  
                                 
            listeners : {
                beforequery: function(qe){
                    delete qe.combo.lastQuery;
                } 
            } 
        });
        var c2 = new Ext.form.ComboBox({  
            //                        renderTo:'combox-panel-grid',
            
            allowBlank:false,
            blankText:"会员权限不能为空",
            readOnly:false ,
            mode : "remote" ,
              
            triggerAction : "all" ,
                
            emptyText : "请选择会员权限" ,
            hiddenName : "access" ,
            forceSelection : true ,				//必须选择一项
            editable : false,                     
            fieldLabel : '控制器',  
            hiddenName : 'cid',  
            
                              
            width:300,  
            displayField:'name',  
            valueField:'id',  
            store:store2,  
            mode :"remote" ,  
  
            emptyText:'请选择...',  
                                
            listeners : {
                beforequery: function(qe){
                    delete qe.combo.lastQuery;
                } 
            },
            onSelect:function(record,rowIndex){ 
                                        
                nid= record.get("id");
                c3.enable();  
               
                c3.setValue('请选择');
                store3 = new Ext.data.Store({  
                    proxy: new Ext.data.HttpProxy({
                        url:app + '/Role/RoleAct/rid/'+rid+'/nid/'+nid
                    }), 
                                
                    reader: new Ext.data.JsonReader({  
                        totalProperty: 'totalCount',  
                        root: 'data',  
                        id:'id'  
                    }, [  
                    {
                        name: 'id', 
                        type: 'int'
                    },  

                    {
                        name: 'name', 
                        type: 'string'
                    },  

                    {
                        name: 'title', 
                        type: 'string'
                    },  

                    {
                        name: 'used', 
                        type: 'string'
                    }  
                    ]),  
                    baseParams:{  
                        start:0,
                        limit:10  
                    }  
                });
                store3.load({
                    callback: function(records, options, success){ 
                        c3.bindStore(store3);
                    }
                });
                                       
                c2.setValue(record.get("id"));  
                c2.setRawValue(record.get("name"));  
            } 
        });
                        
                        
                      
        var c1 = new Ext.form.ComboBox({  
            //                        renderTo:'combox-panel-grid',
            typeAhead : true,  
            fieldLabel : '项目权限',  
            hiddenName : 'appid',  
            triggerAction : 'all',  
            lazyRender : true,  
            width:300,  
            displayField:'name',  
            valueField:'id',  
            store:store1,  
            mode :"remote" ,  
            listClass : 'x-combo-list-small',  
            selectedClass:'',   
            allowBlank : false,  
            emptyText:'请选择...',  
            cm:cm,  
            onSelect:function(record,rowIndex){  
                c3.clearValue();  
                c3.disable();
                nid= record.get("id");
                c2.enable();  
                c2.clearValue();  
                c2.setValue('请选择');
                store2 = new Ext.data.Store({  
                    proxy: new Ext.data.HttpProxy({
                        url:app + '/Role/RoleControl/rid/'+rid+'/nid/'+nid
                    }), 
                                
                    reader: new Ext.data.JsonReader({  
                        totalProperty: 'totalCount',  
                        root: 'data',  
                        id:'id'  
                    }, [  
                    {
                        name: 'id', 
                        type: 'int'
                    },  

                    {
                        name: 'name', 
                        type: 'string'
                    },  

                    {
                        name: 'title', 
                        type: 'string'
                    },  

                    {
                        name: 'used', 
                        type: 'string'
                    }  
                    ]),  
                    baseParams:{  
                        start:0,
                        limit:10  
                    }  
                });
                                          
                                        
                store2.load({
                    callback: function(records, options, success){ 
                        c2.bindStore(store2);
                    }
                });
                                        
                c1.setValue(record.get("id"));  
                c1.setRawValue(record.get("name"));  
            },  
            plugins : [new Ext.plugins.GridCombox()]  
        });
        c2.disable();
        c3.disable();
        c1.setValue('请选择');
        var gridpanel = this.onGetGrid();
        var _formpanel = new Ext.form.FormPanel({
            plain:true,
            layout:"form",
            defaultType:"textfield",
            labelWidth:60,
            baseCls:"x-plain",
            defaults:{
                anchor:"96%"
            },
            buttonAlign:"center",
            bodyStyle:'padding:5px',
            items:[c1,c2,c3]
        });
        var _window=new Ext.Window({
            title:"授权",
            iconCls:'con-add',
            width:580,
            height:183,
            collapsible:true,
            closable:false,
            resizable:false,
            draggable:false,
            modal:true,
            plain:true,
            buttonAlign:'center',
            items:[_formpanel],
            buttons:[{
                text:"保存",
                handler:function(){
                    if(c3.value=='')
                    {
                            c3.disable();
 
                     }
                   
                    _formpanel.form.doAction('submit',{
                        url:app+'/Role/AddAccess',
                        params:{
                            rid:rid 
                        },
                        waitMsg: '正在保存中。。。',
                        method:'post',
                        success:function(form,action){
                            
                        },
                        failure:function(){
                            Ext.Msg.alert('错误','服务器出现错误请稍后再试！');
                        }
                    });
                },
                scope:this
            },{
                text:'关闭',
                handler:function(){
                    _window.close();	
                },
                scope:this
            }]
        });
        _window.show();
    },
    constructor: function(){
        this.toolbar = [{
            text: '--授权',
            iconCls: 'add',
            tooltip: '刷新',
            handler: this.accessClick,
            scope: this
        } ];       
        
        this.sm = '';
         
        this.cm = new Ext.grid.ColumnModel([
            new Ext.grid.RowNumberer(),//获得行号
            {
                header:"&nbsp;&nbsp;<font color=red>会员分组名称</font>",
                tooltip:"会员分组名称",     
                dataIndex:'name',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
            } ,
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
                header:"&nbsp;&nbsp;<font color=red>描述</font>",
                     
                dataIndex:'remark',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false
            }
            ,
                        
            {
                header:"&nbsp;&nbsp;<font color=red>ID</font>",
                     
                dataIndex:'id',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false
	            
            },
                        
            {
                header:"&nbsp;&nbsp;<font color=red>权限类型</font>",
                     
                dataIndex:'saveType',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false
	            
            }
            ]);
              
        RolePanel.superclass.constructor.call(this);
        
    } ,
    onGetGrid : function(){
        return this.gridPanel;
    }
});