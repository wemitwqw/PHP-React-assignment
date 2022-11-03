import { useEffect} from 'react';
import './AddItem.css'
import Container from '@mui/material/Container';
import Grid from '@mui/material/Unstable_Grid2';
import AddItemForm from './AddItemForm';
import { useNavigate } from "react-router-dom";

function AddItem({setHomeView}) {
    const navigate = useNavigate()

    useEffect(() => {
        setHomeView(false)   
    },[])

    const addItemHandler = (item) => {
        fetch('http://scandiweb/add', 
        { 
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: item
        }
        ).then(res => { 
            console.log(res)
            // navigate("/")
            return res;
        })
    }

    return (
        <div className="main"> 
            <Container>
                <Grid
                container
                spacing={0}
                direction="row"
                justify="space-between"
                alignItems="center"
                justifyContent="center"
                sx={{ flexGrow: 1, gap: 1 }}
                >
                    <AddItemForm onAddItem={addItemHandler} />
                </Grid>
            </Container>
        </div>
    );
}

export default AddItem;