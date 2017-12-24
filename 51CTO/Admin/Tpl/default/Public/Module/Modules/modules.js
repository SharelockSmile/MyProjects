ModulesPanel = Ext.extend(Ext.goods.CrudPanel, {
    //id: "product-class",
    baseUrl: app + '/Modules',
    storeMapping: ["title",'content','position',"module",'access',"published","showtitle",'params','id'],
    ID: "id",
    render_div:'modules-div',
    toolbar : {},
    mark : 1 ,
    addtooltip : "添加模块" ,
    //    modifytooltip : "修改已选定的会员信息" ,
    deletetooltip : "删除已选定的模块" ,
    refreshtooltip : "刷新" ,
    addtitle : "添加模块" ,
    modifytitle : "修改模块" ,
                
    createForm: function(status){
         
        var cf= this;
        var status= status;
        var setdata = new Ext.data.Store({
            proxy : new Ext.data.HttpProxy({
                url : app + '/Article/ListSecCat',
                method:'post',
                async:true
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
            ,
            {
                name : "cv"
            }
             
            ]),
            baseParams: {
                region: 1, 
                scopeId: 1
            },
            autoLoad : true,
            listeners:{
                load: function(store,record,opts){
                    var defaultdata = store.data.items[3];
                   
                }
            }
        })
        //        if(status=='save'){
        //            setdata.load({
        //                callback: function(records, options, success){
        //                    if(success){
        //                        var record = cf.gridPanel.getSelectionModel().getSelected();//获取选择的记录集
        //                        var id = record.get("sid");
        //                        var cvdata=  setdata.queryBy(function(record) {   
        //                            return record.get('id') == id ;   
        //                        });
        //                        var cvdata = cvdata.items[0].data.cv; 
        //                        catCombo.store.loadData(cvdata);  
        //                       
        //                    }
        //                }
        //            })     
        //        
        //        }
   
        var menuname=new Ext.form.ComboBox({  
  
            hiddenName:'sectionid',  
            id:Ext.id(),
            name: 'sectionid',  
            autoLoad : true,
            valueField:"id",  
  
            displayField:"title",  
  
            mode : "remote", 
  
            fieldLabel: '<font color=red>菜单名称</font>',  
  
            blankText:'菜单名称',  
  
            emptyText:'菜单名称',  
  
            editable:false,  
  
            anchor:'90%',  
  
            forceSelection:true,  
  
            triggerAction:'all',  
  
            store: new Ext.data.Store({
                proxy : new Ext.data.HttpProxy({
                    url : app + '/Modules/MenuName',
                    method:'post',
                    async:true
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
                 
             
                ]),
                baseParams: {
                    region: 1, 
                    scopeId: 1
                },
                autoLoad : true
                
            }) 
        });
        var styledata= [['verticalmenu','垂直'],['rankmenu','水平']];
        var style=new Ext.form.ComboBox({  
  
            hiddenName:'style',  
            id:Ext.id(),
            name: 'style',  
            autoLoad : true,
            valueField:"id",  
  
            displayField:"name",  
  
            mode : "local", 
  
            fieldLabel: '<font color=red>显示方式</font>',  
  
            blankText:'显示方式',  
  
            emptyText:'显示方式',  
  
            editable:false,  
  
            anchor:'90%',  
  
            forceSelection:true,  
  
            triggerAction:'all',  
  
            store:new Ext.data.SimpleStore(  
  
            {  
  
                    fields: ["id","name"],  
  
                    data:styledata,  
  
                    sortInfo:{
                        field:'name'
                    }  
  
                }  
  
                ) 
        });
        var fenlei= [['Menu','菜单模块'],['LatestNews','最新文章模块']];
        var position= [['0','top'],['1','right'],['2','foot'],['3','left']];
         
        var typeComBo=new Ext.form.ComboBox({  
  
            hiddenName:'fenlei',  
  
            name: 'fenlei',  
  
            valueField:"id",  
  
            displayField:"name",  
  
            mode:'local',  
  
            fieldLabel: '<font color=red>模块类型</font>',  
  
            blankText:'模块类型',  
  
            emptyText:'模块类型',  
  
            editable:false,  
  
            anchor:'90%',  
  
            forceSelection:true,  
  
            triggerAction:'all',  
  
            store:new Ext.data.SimpleStore(  
  
            {  
  
                    fields: ["id","name"],  
  
                    data:fenlei,  
  
                    sortInfo:{
                        field:'name'
                    }  
  
                }  
  
                ) 
        });
        var positionComBo=new Ext.form.ComboBox({  
  
            hiddenName:'position',  
  
            name: 'position',  
  
            valueField:"id",  
  
            displayField:"name",  
  
            mode:'local',  
  
            fieldLabel: '<font color=red>显示位置</font>',  
  
            blankText:'显示位置',  
  
            emptyText:'显示位置',  
  
            editable:false,  
  
            anchor:'90%',  
  
            forceSelection:true,  
  
            triggerAction:'all',  
  
            store:new Ext.data.SimpleStore(  
  
            {  
  
                    fields: ["id","name"],  
  
                    data:position,  
  
                    sortInfo:{
                        field:'name'
                    }  
  
                }  
  
                ) 
        });
        var menuAccess = new Ext.form.RadioGroup({
            name:"menuid",
            fieldLabel:"<font color=red>菜单分配</font>", 
            autoHeight:true ,
            hideLabels: true,
       
           
            layout:'column',
            items: [
            {
                boxLabel: '所有菜单', 
                name: 'menu', 
                inputValue: '1',
                listeners :{
                    'check':function(checkbox, checked){
                        if(checked)
                            menu.disable();
                    }
                },
                checked: true
            },

            {
                boxLabel: '从列表中选择', 
                name: 'menu',               
                inputValue: '0',
                listeners:{
                    'check':function(checkbox, checked){
                        if(checked)
                            menu.enable();
                    }
                }
            } 
            ]
        });
        var menu =   new Ext.ux.ComboBoxCheckTree(
        { 
                
            name:'cname',
                 
            fieldLabel : '|_列表',
            hiddenName : 'tkId',
            sm : 'all',
            defaultId : '',
            checked:true ,
            anchor : "90%",
            tree : {
                xtype:'treepanel',
                height:100,
                checkModel: 'cascade',   //cascade selection
                onlyLeafCheckable: false,//all nodes with checkboxes
                animate: true,
                rootVisible: true,
                autoScroll:true,
                loader: new Ext.tree.TreeLoader({
                    dataUrl:app+'/MenuItem/tree', 
                    baseAttrs: {
                        uiProvider: Ext.ux.TreeCheckNodeUI
                    }
                }),
                root : new Ext.tree.AsyncTreeNode({
                    id:'0',
                    text:'root'
                })
            },
            
              
                
            hiddenName : "menuid" 
		
        } );
        menu.disable();
        var formPanel = new Ext.form.FormPanel({
            plain:true,
            layout:"form",
            defaultType:"textfield",
            labelWidth:65,
            frame:true,
            //锚点布局-
            defaults:{
                anchor:"90%",
                msgTarget:"side"
            },
            buttonAlign:"center",
            bodyStyle:"padding:0 0 0 0",
            monitorValid : true,
            items:[typeComBo,positionComBo,menuAccess,menu,menuname,style,{
                name:"title",
                fieldLabel:"<font color=red>标题</font>",
                allowBlank:false,
                blankText:"",
                readOnly:false
            }, 
            {
                xtype : 'radiogroup',
               
  
                name:"published",
                fieldLabel:"<font color=red>是否发布</font>", 
                autoHeight:true,
               
                hideLabels: true,
                layout:'column',
                items: [
                {
                    boxLabel: '是', 
                    name: 'published', 
                    inputValue: '1', 
                    checked: true
                },

                {
                    boxLabel: '否', 
                    name: 'published', 
                    inputValue: '0'
                } 
                ]
            } , 
{
                xtype : 'radiogroup',
                allowBlank : false,
  
                name:"showtitle",
                fieldLabel:"<font color=red>是否显示标题</font>", 
                autoHeight:true,
                 
                hideLabels: true,
                layout:'column',
                items: [
                {
                    boxLabel: '是', 
                    name: 'showtitle', 
                    inputValue: '1', 
                    checked: true
                },

                {
                    boxLabel: '否', 
                    name: 'showtitle', 
                    inputValue: '0'
                } 
                ]
            } , 
{
                xtype : "combo" ,
                name:"access",
                fieldLabel:"<font color=red>访问级别</font>",
                allowBlank:false,
                blankText:"访问级别不能为空",
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
                emptyText : "请选择访问级别" ,
                hiddenName : "access" ,
                forceSelection : true ,				//必须选择一项
                editable : false
            } ,
{
                name: "id",
                xtype: "hidden"
            }]
        });
				
        return formPanel;
      
        
    },
    createWin: function(status){
        return this.initWin(545, 500, status);
    },

 
    constructor: function(){
        
        this.sm = '';
        this.cm = new Ext.grid.ColumnModel([
            new Ext.grid.RowNumberer(),//获得行号
            {
                header:"&nbsp;&nbsp;<font color=red>模块名称</font>",
                tooltip:"模块名称",     
                dataIndex:'title',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            },
            {
                header:"&nbsp;&nbsp;<font color=red>位置</font>",
                tooltip:"位置",     
                dataIndex:'position',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            }, {
                header:"&nbsp;&nbsp;<font color=red>类型</font>",
                tooltip:"类型",     
                dataIndex:'module',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            } ,
{
                header:"&nbsp;&nbsp;<font color=red>访问级别</font>",
                tooltip:"访问级别",     
                dataIndex:'access',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            },
            {
                header:"&nbsp;&nbsp;<font color=red>发布</font>",
                     
                dataIndex:'published',
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
            ,
            {        
                dataIndex:'id',
                hidden:true  
            }
            ]);
	         
        ModulesPanel.superclass.constructor.call(this);
        
    } ,
    onGetGrid : function(){
        return this.gridPanel;
    }
});