/**
 * 定义MainPanel类
 */
MainPanel = Ext.extend(Ext.TabPanel , {

	constructor : function(){

		MainPanel.superclass.constructor.call(this , {

			id : 'defaultpanel' ,
			region : 'center' ,
			resizeTabs : false ,
			minTabWidth : 135 ,
			tabWidth : 135 ,
			//enableTabScroll : true ,
			border : true ,
			//collapseMode:'mini',
			//collapsible:true,
			activeTab : 0,
			items : [
				new Ext.Panel({
					id : 'defaultpage' ,
					title : '管理首页' ,
					iconCls : 'indextabtitle' ,
					border : false ,
					//autoLoad : '/Goods/Goods_Manage/Tpl/default/Index/info.html',
					html : '<iframe name=info frameBorder=0 scrolling=no src="Admin/Tpl/default/Index/info.html" style="HEIGHT:480px;VISIBILITY:inherit;WIDTH:800px;Z-INDEX:0"></iframe>'
				})
			]
		}) ;
		//this.on('tabchange', this.changeTab, this);
		this.on('contextmenu' , this.onContextMenu) ;
	} ,
	changeTab:function(tab,newtab){
		//如果存在相应树节点，就选中,否则就清空选择状态
        var nodeId = newtab.id.replace('tab-','');
		var menuTree = Ext.getCmp('manager') ;
        var node = menuTree.getNodeById(nodeId);
        if(node){
            menuTree.getSelectionModel().select(node);
        }else{
            menuTree.getSelectionModel().clearSelections();
        }
	},
		//在首页的tab上的右键菜单
	onContextMenu : function(_tabs , item , _e){
		var menu ;
		 if(!menu){ // create context menu on first right click
		tabmenu = new Ext.menu.Menu({
			id: 'tabmenu' ,
			items: [{
				id: _tabs.id+'-close' ,
				text: '关闭标签' ,
				//iconCls: 'close-tab' ,
				handler: function(){
					_tabs.remove(ctxItem) ;
				}
			},{
				id: _tabs.id+'-close-others' ,
				text: '关闭其它标签' ,
				//iconCls: 'close-tab' ,
				handler : function(){
                    _tabs.items.each(function(item){
                        if(item.closable && item != ctxItem){
                            _tabs.remove(item);
                        }
                    });
				}
			},{
			    id : 'loginout',
			    text : '退出系统',
			    handler : function(){
			        Ext.Msg.confirm("系统提示" , "您确定要退出系统吗？" ,function(_btn){
			            if(_btn == "yes"){
			                Ext.Ajax.request({
			                   url:app + '/Login/LoginOut',
			                   success : function(){
			                        window.opener=null;    
                                    //window.open("","_self");
									window.open("登出成功","__APP__/Login/");
                                    //window.close(); 
			                   },
			                   failure : function(){
        							window.open("登出失败","");
			                   }
			                });
			            }
			        });
			    }
			}]
		}) ;
        }
		ctxItem = item;
        var items = tabmenu.items;
        items.get(_tabs.id + '-close').setDisabled(!item.closable);
        var disableOthers = true;
        _tabs.items.each(function(){
            if(this != item && this.closable){
                disableOthers = false;
                return false;
            }
        });
        items.get(_tabs.id + '-close-others').setDisabled(disableOthers);
		tabmenu.showAt(_e.getXY()) ;
	}
}) ;