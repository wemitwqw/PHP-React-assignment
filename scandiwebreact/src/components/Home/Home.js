import { useState, useEffect} from 'react';
import './Home.css'
import Container from '@mui/material/Container';
import Grid from '@mui/material/Unstable_Grid2';
import Card from '@mui/material/Card';
import Typography from '@mui/material/Typography';
import CardContent from '@mui/material/CardContent';

function Home({checked, setChecked, setHomeView}) {
    const [isLoading, setIsLoading] = useState(true)
    const [loadedItems, setLoadedItems] = useState([])

    useEffect(() => {
        fetch('http://129.151.223.209:3001/').then(res => { 
        return res.json(); 
        }).then(data => {
        setIsLoading(false);
        setLoadedItems(data);
        setHomeView(true)
        });
    },[])

    if (isLoading) {
        return null;
    }

    const handleCheckbox = (e) => {
        let index = checked.indexOf(e.target.id)
        if(index>-1) {
            setChecked(current =>current.filter(element => {return element !== e.target.id}))
        } else {
            setChecked(current => [...current, e.target.id])
        }
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
                {loadedItems.map(({id, sku, name, price, type, attr}) => (
                    <Card 
                    key={id}
                    sx={{ width: '25%'}}
                    >
                        <CardContent style={{textAlign: "center"}} sx={{ flexGrow: 0 }}>
                            {/* <Checkbox className="delete-checkbox" /> */}
                            <Grid>
                                <Typography>
                                    {sku}
                                </Typography>
                                <Typography>
                                    {name}
                                </Typography>
                                <Typography>
                                    {price} $
                                </Typography>
                                <Typography>
                                    {type==='dvd' ? 'Size: '+attr+' MB' : type==='book' ? 'Weight: '+attr+' KG' : 'Dimension: '+attr}
                                </Typography>
                            </Grid>
                        </CardContent>
                        <input type="checkbox" className="delete-checkbox" id={id} onClick={handleCheckbox}/>
                    </Card>
                ))}
            </Grid>
            </Container>
        </div>
    );
}

export default Home;