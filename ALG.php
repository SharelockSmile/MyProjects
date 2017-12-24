<html>
    <head>
        <script type="text/javascript">
            /*øÏÀŸ≈≈–Ú*/
            function quickSort(arr,l,r)
            {
                if(l<r)
                    {
                        var i=1,j=r,x=arr[i];
                        while(i<j)
                            {
                                while(i<j&&arr[j]>x)
                                    {
                                        j--;
                                    }
                                if(i<j)
                                    {
                                        arr[i++]=arr[j];
                                    }
                                while(i<j&&arr[i]<x)
                                    {
                                        i++;
                                    }
                                if(i<j)
                                    {
                                        arr[j--]=arr[i];
                                    }
                            }
                        arr[i]=x;
                        quickSort(arr,l,i-1);
                        quickSort(arr,i+1,r);
                    }
                }
            
        </script>
    </head>
    <body >
    </body>
</html>
<?php ?>