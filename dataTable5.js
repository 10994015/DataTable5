import  "./config/alpine.min.js";
import  "./config/axios.min.js";
const dataTable5 = ()=>{
    return {
        init(){
            window.onload = ()=>{
                this.isloading = false
            }
        },
        isloading:true,
        dataTable5:{
            data:tableData,
            filterData:[],
            dataLangth:tableData.length,
            currentpage:1,
            limit:tableLimit.default,
            limitData: tableLimit.limit,
            pageNumber:1,
            isLoss:false,
            search:'',
            category:'',
            sort:tableHeader.default,
            sortDirection:'desc',
            tableHeader:tableHeader.data,
            categoriesColumns:tableCategories.columns,
            categoryColumn: tableCategories.column,
            categoryShow: tableCategories.show,
            categoryContent: tableCategories.categories,
            searchShow: tableSearch.show,
            searchColumns: tableSearch.columns,
        },
        selectSort(sort){
            this.dataTable5.sortDirection = this.dataTable5.sort === sort ? (this.dataTable5.sortDirection === 'asc' ? 'desc' : 'asc') : 'desc';
            this.dataTable5.sort = sort;
        },
        switchPage(page){
            console.log(page);
            this.dataTable5.currentpage = page;
        },
        dynamicSort(property, direction = 'asc') {
            return function (a, b) {
                let valueA = a[property];
                let valueB = b[property];
        
                // 嘗試將值轉換為數字
                let numericA = Number(valueA);
                let numericB = Number(valueB);
        
                // 檢查轉換後的值是否都是有效的數字
                if (!isNaN(numericA) && !isNaN(numericB)) {
                    // 如果兩個值都是數字，則直接進行數字比較
                    return direction === 'desc' ? numericB - numericA : numericA - numericB;
                } else {
                    // 否則，將兩個值都視為字串進行比較
                    valueA = String(valueA);
                    valueB = String(valueB);
                    return direction === 'desc' ? valueB.localeCompare(valueA) : valueA.localeCompare(valueB);
                }
            };
        
        },    
        changeCategory(value, column){
            this.dataTable5.categoryColumn = column;
            this.dataTable5.category = value;
        }, 
        get getRowData(){
            const data = this.dataTable5.data.filter(item => {
                return this.dataTable5.category === '' ? true : item[this.dataTable5.categoryColumn] == this.dataTable5.category;
            }).filter(item => {
                const search = this.dataTable5.search.toLocaleLowerCase();
                return this.dataTable5.searchColumns.some(column => {
                    return item[column] && String(item[column]).toLocaleLowerCase().includes(search);
                });
            });
            this.dataTable5.dataLangth = data.length;
            this.dataTable5.pageNumber = Math.ceil(this.dataTable5.dataLangth / this.dataTable5.limit);
            this.dataTable5.currentpage = this.dataTable5.currentpage > this.dataTable5.pageNumber ? 1 : this.dataTable5.currentpage;
            const startRow = this.dataTable5.limit*(this.dataTable5.currentpage-1);
            const endRow = this.dataTable5.limit*(this.dataTable5.currentpage-1) + this.dataTable5.limit;

            if (this.dataTable5.sortDirection === 'desc') {
                return data.sort(this.dynamicSort(this.dataTable5.sort, 'desc')).slice(startRow, endRow);
            } else {
                return data.sort(this.dynamicSort(this.dataTable5.sort, 'asc')).slice(startRow, endRow);
            }
        },
    }
};

window.dataTable5 = dataTable5;