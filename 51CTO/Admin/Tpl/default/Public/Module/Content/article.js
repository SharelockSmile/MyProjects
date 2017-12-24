ArticlePanel = Ext.extend(Ext.goods.CrudPanel, {
    //id: "product-class",
    baseUrl: app + '/Article',
    storeMapping: ["atitle",'ctitle','stitle',"title_alias",'aalias',"apublished","aaccess",'cid','created','sid','created_by','id'],
    ID: "id",
    render_div:'article-div',
    toolbar : {},
    mark : 1 ,
    addtooltip : "添加文章" ,
    //    modifytooltip : "修改已选定的会员信息" ,
    deletetooltip : "删除已选定的文章" ,
    refreshtooltip : "刷新" ,
    addtitle : "添加文章" ,
    modifytitle : "添加文章" ,
                
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
   
        var sectionCombo=new Ext.form.ComboBox({  
  
            hiddenName:'sectionid',  
            id:Ext.id(),
            name: 'sectionid',  
            autoLoad : true,
            valueField:"id",  
  
            displayField:"title",  
  
            mode : "remote", 
  
            fieldLabel: '<font color=red>文章单元</font>',  
  
            blankText:'选择文章单元',  
  
            emptyText:'选择文章单元',  
  
            editable:false,  
  
            anchor:'90%',  
  
            forceSelection:true,  
  
            triggerAction:'all',  
  
            store: new Ext.data.Store({
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
                    load: function(store,records,opts){
                        if(status=='save'){
                            var record = cf.gridPanel.getSelectionModel().getSelected();//获取选择的记录集
                            var id = record.get("sid");
                            var cid = record.get("cid");
                            var svdata=  Ext.getCmp(sectionCombo.id).store.queryBy(function(record) {   
                                return record.get('id') == id ;   
                            });
                            var n = svdata.get('id');
                            Ext.getCmp(sectionCombo.id).setValue(svdata.items[0].data.id);
                            var cvdata = svdata.items[0].data.cv;
                            for (var i=0;i<cvdata.length;i++){
                                if (cvdata[i]['id']==cid){
                                    cvdata=cvdata[i];
                                };
                            }
                            
                            catCombo.store.loadData(svdata.items[0].data.cv);  
                            catCombo.setValue(cvdata.id);
                        }
                    }
                }
            }),  
            
            listeners:{  
                 
                select:function(combo, record, index){  
   
  
                    catCombo.clearValue();  
                    
                    catCombo.store.loadData(record.data.cv);  
                   
  
                }
            }
        });
       
        var catCombo=new Ext.form.ComboBox({  
  
            hiddenName:'catid',  
            id:Ext.id(),
            name:'catid',  
  
            valueField:"id",  
  
            displayField:"title",  
  
            mode:'local',  
  
            fieldLabel: '<font color=red>文章分类</font>',  
  
            blankText:'请选择分类',  
  
            emptyText:'请选择分类',   
  
            editable:false,  
  
            anchor:'90%',  
  
            forceSelection:true,  
  
            triggerAction:'all',  
  
            store:new Ext.data.Store({
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
            })
        });  
        if(status=="save"){
        
            var a  =sectionCombo.store==setdata;
            var b = sectionCombo.store.getAt(0);
         
            var c=';';
        //          sectionCombo.setValue( sectionCombo.store.getAt(0).get('title') );
        //            logTypeCombo.setValue( logTypeCombo.store.getAt(0).get('key') );
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
            items:[sectionCombo,catCombo,{
                name:"atitle",
                fieldLabel:"<font color=red>标题</font>",
                allowBlank:false,
                blankText:"登录名不允许为空",
                readOnly:false
            },
            {
                name:"aalias",
                fieldLabel:"<font color=red>别名</font>",
                allowBlank:false,
                blankText:"密码不允许为空",
                readOnly:false 
            } ,
{
                xtype : "combo" ,
                name:"aaccess",
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
                hiddenName : "aaccess" ,
                forceSelection : true ,				//必须选择一项
                editable : false
            },
            {
                xtype: 'fieldset',
                name:"apublished",
                fieldLabel:"<font color=red>是否发布</font>", 
                autoHeight:true,
                defaultType: 'radio',
                hideLabels: true,
                layout:'column',
                hiddenName : "aaccess" ,
                items: [
                {
                    boxLabel: '是', 
                    name: 'apublished', 
                    inputValue: '1', 
                    checked: true
                },

                {
                    boxLabel: '否', 
                    name: 'apublished', 
                    inputValue: '0'
                } 
                ]
            },{
                xtype:"htmleditor",
                height:300,
                 
                name:"introtext",
                fieldLabel:"日志内容"
            },{
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
                header:"&nbsp;&nbsp;<font color=red>标题</font>",
                tooltip:"标题",     
                dataIndex:'atitle',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            },
            {
                header:"&nbsp;&nbsp;<font color=red>别名</font>",
                tooltip:"别名",     
                dataIndex:'aalias',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            }, {
                header:"&nbsp;&nbsp;<font color=red>所属分类</font>",
                tooltip:"所属单元",     
                dataIndex:'ctitle',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            },
            {
                header:"&nbsp;&nbsp;<font color=red>所属单元</font>",
                tooltip:"所属单元",     
                dataIndex:'stitle',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            },
            {
                header:"&nbsp;&nbsp;<font color=red>访问级别</font>",
                tooltip:"访问级别",     
                dataIndex:'aaccess',
                menuDisabled : false,
                align:'left',
                width:10,
                resizable:false 
       
            },
            {
                header:"&nbsp;&nbsp;<font color=red>发布</font>",
                     
                dataIndex:'apublished',
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
                dataIndex:'sid',
                hidden:true  
            }
            ]);
	         
        ArticlePanel.superclass.constructor.call(this);
        
    } ,
    onGetGrid : function(){
        return this.gridPanel;
    }
});