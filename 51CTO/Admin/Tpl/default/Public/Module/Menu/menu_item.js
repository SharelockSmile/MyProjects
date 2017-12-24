MenuItemPanel = Ext.extend(Ext.goods.CrudPanel, {

    baseUrl: app + '/MenuItem',				
    storeMapping: ['id','name','pid','type','componentid','order','published','access','marginnum','signnum'],
    ID: 'id',
    render_div:node_div,
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
                
    createForm: function(status){
         
        var fenlei= [[1,'文章内容'],[2,'单元内容'],[3,'分类内容']];
        var nav= [[0,'在带导航栏的当前窗口打开'],[1,'在带导航栏的新窗口打开'],[2,'在不带导航栏的当前窗口打开']];
        var ctype=0;
        var provinceComBo=new Ext.form.ComboBox({  
  
            hiddenName:'fenlei',  
  
            name: 'fenlei',  
  
            valueField:"id",  
  
            displayField:"name",  
  
            mode:'local',  
  
            fieldLabel: '<font color=red>内容类型</font>',  
  
            blankText:'内容类型',  
  
            emptyText:'内容类型',  
  
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
  
                ),  
            
            listeners:{  
                
                select:function(combo, record, index){  
                   
                    switch (record.data.id) {
                        case 1 :
                            ctype='Art' ;
                            break;
                        case 2 :
                            ctype='Sec' ;
                            break;
                        case 3 :
                            ctype='Car' ;
                            break;
                    }
                    ctype =  new Ext.data.Store({
                        proxy : new Ext.data.HttpProxy({
                            url:app + '/MenuItem/'+ctype, 
                    
                            method:'post'
                    
                        }) ,
                        
                        reader : new Ext.data.JsonReader({
                            root          : 'root',  
                     
                            fields        : [  
                            {
                                name:'id'
                            },  

                            {
                                name:'atitle'
                            }  
                            ],
                            totalProperty : 'totalCount'
                        } )
                    });
                    cityCombo.enable();  
                    cityCombo.clearValue();  
                    ctype.load({
                        callback: function(records, options, success){ 
                           cityCombo.bindStore(ctype);  
                        }
                    })
                                    
                }
            }
        });
        
        var cityCombo=new Ext.form.ComboBox({  
  
            hiddenName:'ctype',  
  
            name:'city_name',  
  
            valueField:"id",  
  
            displayField:"atitle",  
  
            mode:'remote',  
  
            fieldLabel: '<font color=red>选择文章</font>',  
  
            blankText:'选择文章',  
  
            emptyText:'选择文章',   
  
            editable:false,  
  
            anchor:'90%',  
  
            forceSelection:true,  
  
            triggerAction:'all',  
          
            pageSize        : 4  ,
            store:'',
            listeners:{  
                
        }
        });  
        cityCombo.disable();
         if(status == 'edit'){
                provinceComBo.disable();    
            }  
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
            items:[provinceComBo,cityCombo,{
                name:"name",
                fieldLabel:"<font color=red>菜单项标题</font>",
                allowBlank:false,
                blankText:"",
                readOnly:false
            }, 
            {
                xtype: 'fieldset',
                name:"published",
                fieldLabel:"<font color=red>发布</font>", 
                autoHeight:true,
                defaultType: 'radio',
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
		xtype : 'combotree',
		name:'cname',
                 fieldLabel:"<font color=red>上层菜单项</font>",
		fieldLabel : '上层菜单项',
		hiddenName : 'tkId',
		sm : 'all',
		defaultId : '2',
		defaultText : '选择上级菜单',
		anchor : "90%",
                dataUrl:app+'/MenuItem/tree',
               
                hiddenName : "pid" 
		
	} , 
{
                xtype : "combo" ,
                name:"access",
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
                hiddenName : "access" ,
                forceSelection : true ,				//必须选择一项
                editable : false
            },
              
{
                xtype : "combo" ,
                name:"nav",
                fieldLabel:"<font color=red>打开方式</font>",
                allowBlank:false,
                blankText:"打开方式",
                readOnly:false ,
                mode : "local" ,
                displayField : "name" ,
                valueField : "id" ,
                triggerAction : "all" ,
                store : new Ext.data.SimpleStore(  
  
            {  
  
                    fields: ["id","name"],  
  
                    data:nav,  
  
                    sortInfo:{
                        field:'name'
                    }  
  
                }  
  
                ), 
                emptyText : "请选打开方式" ,
                hiddenName : "nav" ,
                forceSelection : true ,				//必须选择一项
                editable : false
            },
{
                name: "id",
                xtype: "hidden"
            },
{
                name: "menuid",
                value:node_pid,
                xtype: "hidden"
            }]
        });
			
        return formPanel;
    },
    createWin: function(status){
        return this.initWin(345, 300, status);
    },

 
    constructor: function(){
        this.store = new Ext.data.JsonStore({
            id: this.ID,
                
            url: this.baseUrl + "/ListAll",//默认的数据源地址，继承时需要提供
            root: "data",
            totalProperty: "totalCount",
            remoteSort: true,
            fields: this.storeMapping
        });
        
        this.sm = '';
        var st=this.store; 
        this.cm = new Ext.grid.ColumnModel([
            new Ext.grid.RowNumberer(),//获得行号
            {
                header:"&nbsp;&nbsp;<font color=red>菜单项标题</font>",
                tooltip:"菜单标题",     
                dataIndex:'id',
                menuDisabled : false,
                align:'left',
                renderer:function(v,m,r,ri,ci,store){
                    var k = store.getAt(ri).get('name');
                    var marginnum = store.getAt(ri).get('marginnum');
                    var signnum = store.getAt(ri).get('signnum');
                    if(signnum>1){
                        signnum = '|--';
                    }else{
                        signnum = '';
                    }
                    return '<div style="margin-left:'+marginnum+'px">'+signnum+k+'</div>';
                },
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
	            
            },
            {
                header:"&nbsp;&nbsp;<font color=red>排序</font>",
                tooltip:"菜单项",     
                dataIndex:'order',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false
            } 
            ,
            {
                header:"&nbsp;&nbsp;<font color=red>访问级别</font>",
                     
                dataIndex:'access',
                menuDisabled : false,
                align:'left',
                renderer:function(value){
                    if(value==0){
                        return "公开";
                    }else{
                        return value;
                    }
                },
                width:10,
                resizable:false
	            
            },{
                header:"&nbsp;&nbsp;<font color=red>类型</font>",
                tooltip:"类型",     
                dataIndex:'type',
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
	            
            }
            ]);
	         
        MenuItemPanel.superclass.constructor.call(this);
        
    } ,
    onGetGrid : function(){
        return this.gridPanel;
    }
});
 