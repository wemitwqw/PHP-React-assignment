import { useRef, useState } from 'react';
import './AddItem.css'

function AddItemForm({onAddItem}) {
    const [type, setType] = useState('dvd')
    const [sizeValue, setSizeValue] = useState(null)
    const [weightValue, setWeightValue] = useState(null)
    const [heightValue, setHeightValue] = useState(null)
    const [widthValue, setWidthValue] = useState(null)
    const [lengthValue, setLengthValue] = useState(null)
    const skuInputRef = useRef()
    const nameInputRef = useRef()
    const priceInputRef = useRef()
    
    function formSubmitHandler(e) {
      e.preventDefault()

      const skuValue = skuInputRef.current.value
      const nameValue = nameInputRef.current.value
      const priceValue = priceInputRef.current.value

      const item = new URLSearchParams({
        'sku': skuValue,
        'name': nameValue,
        'price': priceValue,
        'size': sizeValue,
        'weight': weightValue,
        'dimensions': (heightValue ? (heightValue+'x'+widthValue+'x'+lengthValue) : null)
      })

      console.log(skuValue, nameValue, priceValue, sizeValue, weightValue, (heightValue+'x'+widthValue+'x'+lengthValue))
    //   onAddItem(item)
    }

    function handleSelection(e) {
        setType(e.target.value)
        // console.log(e.target.value)
        if(type === 'book') {
            setSizeValue(null)
            setHeightValue(null)
            setLengthValue(null)
            setWidthValue(null)

        } 
        else if (type === 'dvd')
        {
            setHeightValue(null)
            setLengthValue(null)
            setWidthValue(null)
            setWeightValue(null)

        } 
        else {
            setWeightValue(null)
            setSizeValue(null)

        }
        console.log(sizeValue, weightValue, heightValue, widthValue, lengthValue)
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
                <input type="number" min="0.00" step="0.01" id="size" name="size" required onChange={(e)=>setSizeValue(e.target.value)}></input><br/>
            </>
        )}
        {type === "furniture" && (
            <>
                <label htmlFor="height">Height (CM): </label>
                <input type="text" id="height" name="height" required onChange={(e)=>setHeightValue(e.target.value)}></input><br/>
                <label htmlFor="width">Width (CM): </label>
                <input type="text" id="width" name="width" required onChange={(e)=>setWidthValue(e.target.value)}></input><br/>
                <label htmlFor="length">Length (CM): </label>
                <input type="text" id="length" name="length" required onChange={(e)=>setLengthValue(e.target.value)}></input><br/>
            </>
        )}
        {type === "book" && (
            <>
                <label htmlFor="weight">Weight (KG): </label>
                <input type="number" min="0.00" step="0.01" id="weight" name="weight" required onChange={(e)=>setWeightValue(e.target.value)}></input><br/>
            </>
        )}
            {/* <input type="submit" id="submit"></input> */}
        </form> 
    );
}

export default AddItemForm;