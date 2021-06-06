<h3>Plac wojskowy</h3>
        <table class="table table-bordered" style="color: whitesmoke;">
            <tr>
                <th>Nazwa jednostki</th>
                <th>Ilość jednostek</th>
                <th>Do wyszkolenia</th>
                <th>Trenuj</th>
            </tr>
            <tr>
                <td>Piechota</td>
                <td>0</td>
                <form method="post" action="/newUnit">
                    
                    <td><input type="number" name="infantry" id="infantry"></td>
                    <td><button type="submit">Wytrenuj</button></td>
                </form>
            </tr>
            <tr>
                <td>Łucznicy</td>
                <td>0</td>
                <form method="post" action="/newUnit">
                    
                    <td><input type="number" name="archer" id="archer"></td>
                    <td><button type="submit">Wytrenuj</button></td>
                </form>
            </tr>
            <tr>
                <td>Kawaleria</td>
                <td>0</td>
                <form method="post" action="/newUnit">
                    
                    <td><input type="number" name="cavalry" id="cavalry"></td>
                    <td><button type="submit">Wytrenuj</button></td>
                </form>
            </tr>
        </table>
<h3>Obecne armie:</h3>
        <table class="table table-bordered" style="color: whitesmoke;">
            <tr>
                <th>Nazwa armii</th>
                <th>Piechota</th>
                <th>Łucznicy</th>
                <th>Kawaleria</th>
            </tr>
            {foreach from=$armyList item=army}
            <tr>
                <td></td>
                <td>{$army->infantry}</td>
                <td>{$army->archers}</td>
                <td>{$army->cavalry}</td>
            </tr>
            {/foreach}
        </table>