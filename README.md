# DataTable 5

## 這是原生PHP + Alpine.js 的Data Table 套件
#### 引入css、js

> 假設我將dataTable5 的資料夾放在contract-manage/ 底下 

```
<link rel="stylesheet" href="../contract-manage/dataTable5/css/style.css">
<script type="module" src="../contract-manage/dataTable5/dataTable5.js"></script>

```

> 此時已經引入Alpine js 了，接著在裝Table的div引入x-data="dataTable5()"
完整HTML結構可參考:
```
<div x-data="dataTable5()">
    <div class="container-fluid dataTable5">
        <?php include "../contract-manage/dataTable5/components/toolbar.php"; ?> <!--引入toolbar -->
        <main x-show="!isloading">  <!-- 載入時不顯示 -->
            <?php include "../contract-manage/dataTable5/components/pagination.php"; ?>
            <table class="table table-striped dataTable" border=1>
                <?php include "../contract-manage/dataTable5/components/thead.php" ?> <!-- 引入thead -->
                <tbody>
                    <template x-for="(item, idx) in getRowData"> <!-- 固定為getRowData，這裡不需要更改 -->
                    <tr>
                        <td x-text="item.id"></td>
                       <!-- 放其他欄位 -->
                    </tr>
                    </template>
                </tbody>
            </table>
            <?php include "../contract-manage/dataTable5/components/pagination.php"; ?> <!--載入頁碼 -->
        </main>
    </div>
</div>
```

> 設定script

```
<script>
    //將資料傳入在 tableData 的變數
    const tableData = [...<?php echo json_encode(array_values($result)); ?>]; 
    
    //設定顯示筆數，預設100，可自行修改
    const tableLimit = {
        default:100,
        limit:[10,20,50,100,200,500],
    }
    
    //設定thead，default 為預設排序的欄位
    const tableHeader = {
        default:'id',
        data:[
            {name:'單據編號',value:'id'}, // name 為畫面顯示文字，value 為物件欄位名稱
            // ...加入其他欄位
            
        ]
    }
    const tableCategories = {
        show: ture, // 是否開啟分類功能
        columns:[
            {
                column:'status', //欄位名稱
                categories:[
                    {name:'簽核中', value:'YS'}, // name:按鈕文字、value 為該欄位的值
                    {name:'結案同意', value:'YY'},
                    {name:'結案退回', value:'YN'},
                    {name:'暫存', value:'Y1'},
                ]
            },
            // ...可設定更多欄位分類
        ]
    };
    const tableSearch = {
        show:true, // 是否開啟搜尋功能
        columns:[
            'id',
            // 將要搜尋的物件欄位加上來
        ]
    };
</script>

```

> 請按讚分享