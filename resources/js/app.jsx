import './bootstrap';
// import './calendar';
import React from "react";
import ReactDOM from "react-dom/client";

const handleCellClick = (e) => {
  console.log('hoge');
}

const DispatchCell = ({dispatchName}) => {
  
  return(
  <td><button onClick={handleCellClick}>{dispatchName}</button></td>  
  );
}

const DriverDispatch = ({driverName}) => {
    
    return(
        <tr>
          <th scope="row">{driverName}</th>
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="hoge" />
          <DispatchCell dispatchName="foo" />
          <DispatchCell dispatchName="hoo" />
        </tr>
    );
}

const ColInOrder = ({...props}) => {
    
    const {rowName, colName} = props;
    
    return(
        <tr>
          <th scope="col">{rowName} / {colName}</th>
          <th scope="col">1</th>
          <th scope="col">2</th>
          <th scope="col">3</th>
          <th scope="col">4</th>
          <th scope="col">5</th>
          <th scope="col">6</th>
          <th scope="col">7</th>
          <th scope="col">8</th>
        </tr>
    );
}

const DriverTable = () => {
    
    return(
    <div className="row">
      <div className="table-responsive col">
        <table className="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" colSpan={4}>
                午前
              </th>
              <th scope="col" colSpan={4}>
                午後
              </th>
            </tr>
            <ColInOrder rowName="運転手" colName="配車順" />
          </thead>
          <tbody>
            <DriverDispatch driverName="川口" />
            <DriverDispatch driverName="内海" />
            <DriverDispatch driverName="佐々木" />
          </tbody>
        </table>
      </div>
    </div>
    );
}

const DateTime = ({...dateProps}) => {
    
    const {date, startTime, endTime} = dateProps;
    
    return(
    <div className="card">
        <div className="card-header">日時</div>
        <div className="card-body">
          <h5 className="card-title">日付</h5>
          <p className="card-text">{date}</p>
        </div>
        <div className="card-body">
          <h5 className="card-title">時間帯</h5>
          <p className="card-text">{startTime} ~ {endTime}</p>
        </div>
    </div>
    );
}

const CustomerInfomation = ({...customerProps}) => {
    
    const {customerName, locationName, locationMap} = customerProps;
    
    return(
    <div className="card">
        <div className="card-header">顧客情報</div>
        <div className="card-body">
          <h5 className="card-title">引取先 (現場名)</h5>
          <p className="card-text">{customerName} ({locationName})</p>
          {/* 現場詳細画面へ遷移 */}
          <a href={locationMap} className="btn btn-primary">
            現場地図
          </a>
        </div>
    </div>
    );
}

const CarInfomation = ({...carProps}) => {
    
    const {sizeCategory, ability, registrationNumber} = carProps;
    
    return(
    <div className="card">
        <div className="card-header">車両情報</div>
        <div className="card-body">
          <h5 className="card-title">車種</h5>
          <p className="card-text">{sizeCategory}t {ability}</p>
          <h5 className="card-title">車番</h5>
          <p className="card-text">{registrationNumber}</p>
        </div>
    </div>
    );
}

const OtherInfomation = ({...otherProps}) => {
    
    const {item, method, user, description, image} = otherProps;
    
    return(
    <div>
      <div className="card">
        <div className="card-body">
          <h5 className="card-title">持ち物</h5>
          <p className="card-text">{item}</p>
        </div>
      </div>
      <div className="card">
        <div className="card-body">
          <h5 className="card-title">引取方法</h5>
          <p className="card-text">{method}</p>
        </div>
      </div>
      <div className="card">
        <div className="card-body">
          <h5 className="card-title">担当者</h5>
          <p className="card-text">{user}</p>
        </div>
      </div>
      <div className="card">
        <div className="card-body">
          <h5 className="card-title">詳細説明 (画像)</h5>
          <p className="card-text">{description}</p>
        </div>
        <img src={image} className="card-img-bottom" alt="card-img-bottom" />
      </div>
    </div>
    );
}

const DetailDispatch = () => {
    return(
    <div>
        <DateTime 
            date="8月10日"
            startTime="10:00"
            endTime="12:00"
        />
        <CustomerInfomation 
            customerName="丸一解体"
            locationName="藤枝"
            locationMap="#"
        />
        <CarInfomation 
            sizeCategory="10"
            ability="ヒアブ"
            registrationNumber="浜松 た ..20"
        />
        <OtherInfomation 
            item="ハコ×4"
            method="ヒアブで積込"
            user="村松"
            description="現場狭いです。気を付けて。"
        />
    </div>
    );
}

function App() {
    return (
    <div>
        <DriverTable />
        <DetailDispatch />
    </div>
    );
}

const Template = () => {
  return(
    <div className="container">
  <div className="row">
    <div className="col">
      <h1>本日の配車</h1>
    </div>
  </div>
  <div className="row">
    <div className="table-responsive, col">
      <table className="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" colSpan={4}>
              午前
            </th>
            <th scope="col" colSpan={4}>
              午後
            </th>
          </tr>
          <tr>
            <th scope="col">運転手 / 配車順</th>
            <th scope="col">1</th>
            <th scope="col">2</th>
            <th scope="col">3</th>
            <th scope="col">4</th>
            <th scope="col">5</th>
            <th scope="col">6</th>
            <th scope="col">7</th>
            <th scope="col">8</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">ドライバー1</th>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
          </tr>
          <tr>
            <th scope="row">ドライバー2</th>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
          </tr>
          <tr>
            <th scope="row">ドライバー3</th>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
            <td>Cell</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div className="row">
    {/* Cellをクリックしたときに表示される現場詳細 */}
    <div className="card">
      <div className="card-header">日時</div>
      <div className="card-body">
        <h5 className="card-title">日付</h5>
        <p className="card-text">4月1日</p>
      </div>
      <div className="card-body">
        <h5 className="card-title">時間帯</h5>
        <p className="card-text">8:00 ~ 10:00</p>
      </div>
    </div>
    <div className="card">
      <div className="card-header">顧客情報</div>
      <div className="card-body">
        <h5 className="card-title">引取先 (現場名)</h5>
        <p className="card-text">リンナイ (掛川)</p>
        {/* 現場詳細画面へ遷移 */}
        <a href="#" className="btn btn-primary">
          現場地図
        </a>
      </div>
    </div>
    <div className="card">
      <div className="card-header">車両</div>
      <div className="card-body">
        <h5 className="card-title">車種</h5>
        <p className="card-text">4t ユニック</p>
        <h5 className="card-title">車番</h5>
        <p className="card-text">浜松 あ 343 ..25</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">持ち物</h5>
        <p className="card-text">ハコ x10</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">引取方法</h5>
        <p className="card-text">リフト</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">担当者</h5>
        <p className="card-text">石神</p>
      </div>
    </div>
    <div className="card">
      <div className="card-body">
        <h5 className="card-title">詳細説明 (画像)</h5>
        <p className="card-text">現場狭いです。気を付けて</p>
        <p className="card-text">
          <small className="text-muted">Last updated 3 mins ago</small>
        </p>
      </div>
      <img src="#" className="card-img-bottom" alt="card-img-bottom" />
    </div>
  </div>
</div>
  );
}

const root = ReactDOM.createRoot(document.getElementById("react_app"));
root.render(<Template />);