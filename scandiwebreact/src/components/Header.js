import './Header.css'
import AppBar from '@mui/material/AppBar';
import Toolbar from '@mui/material/Toolbar';
import Grid from '@mui/material/Grid';
import Link from '@mui/material/Link';
import Button from '@mui/material/Button';
import Typography from '@mui/material/Typography';

function Header({onMassDelete, homeView}) {

    return (
        <div className='navbar'> 
            <Grid container justifyContent="center" sx={{ mb: 2 }}>
                <Grid xs={8} item>
                    <AppBar position="static">
                        <Toolbar>
                            {
                                homeView===true ? 
                                (
                                <Typography variant="h6" sx={{ my: 2 }}>
                                    Product List
                                </Typography>
                                )
                                :
                                (
                                <Typography variant="h6" sx={{ my: 2 }}>
                                    Product Add
                                </Typography>
                                )
                            }

                            {/* {
                                homeView===true ? 
                                (
                                <>
                                    <Button sx={{ marginLeft: "auto"}} >
                                        <Link
                                            style={{color: 'white', textDecoration: 'none'}}
                                            sx={{ my: 1, mx: 1.5 }}
                                            variant="button"
                                            color="text.primary"
                                            href="/add"
                                            >
                                            Add
                                        </Link>
                                    </Button>
                                    <Button onClick={onMassDelete} size="small" style={{color: 'white'}} id="delete-product-btn">
                                        Mass delete
                                    </Button>
                                </>
                                )
                                :
                                (
                                <>
                                    <Grid sx={{ marginLeft: "auto"}}>
                                        <button form='product_form'
                                        style={{color: 'white'}} 
                                        className="MuiButtonBase-root MuiButton-root MuiButton-text MuiButton-textPrimary MuiButton-sizeMedium MuiButton-textSizeMedium MuiButton-root MuiButton-text MuiButton-textPrimary MuiButton-sizeMedium MuiButton-textSizeMedium css-1e6y48t-MuiButtonBase-root-MuiButton-root"
                                        >
                                            Save
                                        </button>
                                    </Grid>
                                    <Button >
                                        <Link
                                            style={{color: 'white', textDecoration: 'none'}}
                                            sx={{ my: 1, mx: 1.5}}
                                            variant="button"
                                            color="text.primary"
                                            href="/"
                                            >
                                            Cancel
                                        </Link>
                                    </Button>
                                </>
                                )
                            } */}

                            {
                                homeView===true ? 
                                (
                                <>
                                    <Grid sx={{ marginLeft: "auto"}}>
                                        <button
                                        className="buttons"
                                        >
                                            <Link
                                            style={{color: 'black', textDecoration: 'none'}}
                                            sx={{ my: 1, mx: 1.5 }} 
                                            href="/add"
                                            >
                                            ADD
                                        </Link>
                                        </button>
                                    </Grid>
                                    
                                    <Grid sx={{ ml: 1}}>
                                        <button
                                            className="buttons"
                                            onClick={onMassDelete}
                                            id="delete-product-btn"
                                            >
                                            MASS DELETE
                                        </button>
                                    </Grid>
                                </>
                                )
                                :
                                (
                                <>
                                    <Grid sx={{ marginLeft: "auto"}}>
                                        <button form='product_form'
                                        className="buttons"
                                        >
                                            Save
                                        </button>
                                    </Grid>
                                    <Grid sx={{ ml: 1}}>
                                        <button form='product_form'
                                        className="buttons"
                                        >
                                            <Link
                                            style={{color: 'black', textDecoration: 'none'}}
                                            sx={{ my: 1, mx: 1.5}}
                                            href="/"
                                            >
                                                Cancel
                                            </Link>
                                        </button>
                                    </Grid>

                                </>
                                )
                            }
                            
                        </Toolbar>
                    </AppBar>
                </Grid>
            </Grid>
        </div>
    );
}

export default Header;