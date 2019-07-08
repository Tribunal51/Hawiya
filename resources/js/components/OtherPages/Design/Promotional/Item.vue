<template>
    <div class="Cover">
        <slot></slot>
    </div>
</template>

<script>
export default {
    mounted() {
        this.method1();
        // this.method2();


        
    },
    methods: {
        method1() {
            const test = {
                key1: "String",
                key2: {
                    key1: 55,
                    key2: ["Array","of","Strings"]
                },
                key3: [0,1,2],   // Array of Integers
                key4: true          // Boolean value 
            }
            let cons = [
                x => x.constructor === String,
                x => x.constructor === Array && x.every(a => typeof a === "number"),
                x => x.constructor === Boolean,
                x => {
                        if(x.constructor === Object){
                        let funs = [
                            (x) => x.constructor === Number,
                            (x) => x.every(x => x.constructor === String)
                        ]
                        return testFormat(x,funs)
                    }
                }
            ]



            function testFormat(obj, funs){
                let vals = Object.values(obj);
                return vals.length === funs.length && vals.every(x => funs.some(f => f(x)));
                }

            console.log(testFormat(test, cons))
        },
        method2() {
            let basething = {
                key1: "String",
                key2: {
                    key1: 4,
                    key2: {
                        key1: "Test"
                    },
                    key3: ["Array", "of", "Strings"]
                },
                key3: [0, 1, 2], // Array of Integers
                key4: true // Boolean value 
            };

            let test = {
                key1: "String",
                key2: {
                    key1: 98,
                    key2: 4,
                    key3: ["Test"]
                },
                key3: ["Test"], // Array of Integers
                key4: true // Boolean value 
            };
            let example = {
                key1: "String",
                key2: "String",
                key3: "String"
            }

            function compareProperty(object1, object2) {
                let sameStruct = true;
                for (let p in object1) {
                    // compare property
                    if (!object2.hasOwnProperty(p)) {
                        sameStruct = false;
                    } else {
                        if (object2.hasOwnProperty(p)) {
                            // compare type of property
                            sameStruct = sameStruct && (typeof object2[p] === typeof object1[p]);
                        } else {
                            sameStruct = false;
                        }
                    }
                }
                return sameStruct;
                }

            let isSame = compareProperty(basething, example);
            let isSame2 = compareProperty(basething, test);
            console.log(isSame, isSame2);
        }
    }
}
</script>

<style scoped>
    .Cover {
        width: 100px;
        height: 100px;
        margin: 10px;
        padding: 10px;
        border: 1px solid gray;
    }

</style>
