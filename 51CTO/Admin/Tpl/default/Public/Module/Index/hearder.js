/**
 * 定义表现层
 */
Ext.onReady(function(){
         function LoginOut(){
                                                Ext.Msg.confirm("系统提示" , "您确定要退出系统吗？" ,function(_btn){
                                                        if(_btn == "yes"){
                                                                Ext.Ajax.request({
                                                                        url:app + '/Login/LoginOut',
                                                                        success : function(){
                                                                                window.opener=null;    
                                                                                window.open("","_self");    
                                                                                window.close(); //关闭窗口
                                                                        },
                                                                        failure : function(){
        			           
                                                                        }
                                                                });
                                                        }
                                                });
                                        };
        /**
 * 定义MainPanel类
 */
        HearderPanel = Ext.extend(Ext.Panel , {
        
                constructor : function(){
                        
                        HearderPanel.superclass.constructor.call(this , {

                                id : 'loginoutpanel' ,
                                region : 'top' ,
                                resizeTabs : false ,
                                minTabWidth : 135 ,
                                tabWidth : 135 ,
                                enableTabScroll : true ,
                                border : true ,
                                //collapseMode:'mini',
                                //collapsible:true,
                                
                                activeTab : 0,
                                region : "north" ,
		border : false ,
		bodyBorder : false ,
		height : 25 ,
		baseCls: "topback" ,
		html : '<div align="right" style="margin-top:6px"><font face="华文细黑" size="3" ><p>欢迎你：管理员！<a href="#" onclick="javascript:LoginOut()">退出系统</a></font></p></div>',

		bodyStyle : {
			padding:'0 0 0 20px',
			background : '#DFE8F6'
		},
                                tools  : [
                                new Ext.Panel(
                                {
                                        id : 'loginout',
                                        text : '退出系统',
                                        
                                        handler : function(){
                                                Ext.Msg.confirm("系统提示" , "您确定要退出系统吗？" ,function(_btn){
                                                        if(_btn == "yes"){
                                                                Ext.Ajax.request({
                                                                        url:app + '/Login/LoginOut',
                                                                        success : function(){
                                                                                window.opener=null;    
                                                                                window.open("","_self");    
                                                                                window.close(); //关闭窗口
                                                                        },
                                                                        failure : function(){
        			           
                                                                        }
                                                                });
                                                        }
                                                });
                                        }
				
			
                                }) ]
                        //this.on('tabchange', this.changeTab, this);
                        //this.on('contextmenu' , this.onContextMenu) ;
                        } );
                } 

        }) ;
}) ;