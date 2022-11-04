import { useRef, useState } from 'react';
import './AddItem.css'

function AddItemForm({onAddItem}) {
    const [type, setType] = useState('dvd')
    const [attrValue, setAttrValue] = useState(null)

    const skuInputRef = useRef()
    const nameInputRef = useRef()
    const priceInputRef = useRef()
    const heightInputRef = useRef()
    const widthInputRef = useRef()
    const lengthInputRef = useRef()
    
    function formSubmitHandler(e) {
        e.preventDefault()

        const skuValue = skuInputRef.current.value
        const nameValue = nameInputRef.current.value
        const priceValue = priceInputRef.current.value

        if(type==='furniture'){
            const item = new URLSearchParams({
                'sku': skuValue,
                'name': nameValue,
                'price': priceValue,
                'type': type,
                'attr': heightInputRef.current.value+'x'+widthInputRef.current.value+'x'+lengthInputRef.current.value,
            })
            onAddItem(item)
            return
        }
 
        const item = new URLSearchParams({
            'sku': skuValue,
            'name': nameValue,
            'price': priceValue,
            'type': type,
            'attr': attrValue,
        })
        onAddItem(item)
    }

    function handleSelection(e) {
        setType(e.target.value)
    }
    
    return (
        <form id="product_form" className="product-form" onSubmit={formSubmitHandler}>
            <label htmlFor="sku">SKU: </label>
            <input type="text" id="sku" name="sku" required ref={skuInputRef}></input><br/>
            <label htmlFor="name">Name: </label>
            <input type="text" id="name" name="name" required ref={nameInputRef}></input><br/>
            <label htmlFor="price">Price: </label>
            <input type="number" min="0.00" step="0.01" id="price" name="price" required ref={priceInputRef}></input><br/>
            <label htmlFor="type">Type: </label>
            <select name="type" id="productType" required defaultValue="dvd" onChange={handleSelection}>
                <option value="dvd">DVD</option>
                <option value="furniture">Furniture</option>
                <option value="book">Book</option>
            </select><br/>
        {type === "dvd" && (
            <>
                <label htmlFor="size">Size (MB): </label>
                <input type="number" min="0.00" step="0.01" id="size" name="size" required onChange={(e)=>setAttrValue(e.target.value)}></input><br/>
            </>
        )} 
        {type === "furniture" && (
            <>
                <label htmlFor="height">Height (CM): </label>
                <input type="text" id="height" name="height" required ref={heightInputRef}></input><br/>
                <label htmlFor="width">Width (CM): </label>
                <input type="text" id="width" name="width" required ref={widthInputRef}></input><br/>
                <label htmlFor="length">Length (CM): </label>
                <input type="text" id="length" name="length" required ref={lengthInputRef}></input><br/>
            </>
        )}
        {type === "book" && (
            <>
                <label htmlFor="weight">Weight (KG): </label>
                <input type="number" min="0.00" step="0.01" id="weight" name="weight" required onChange={(e)=>setAttrValue(e.target.value)}></input><br/>
            </>
        )}
        </form> 
    );
}

export default AddItemForm;