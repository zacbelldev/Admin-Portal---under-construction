require 'sinatra/base'
require 'easypost'
require 'printnode'
require 'tilt/erb'
require 'dotenv'

class App < Sinatra::Base
  configure do
    Dotenv.load
    EasyPost.api_key = ENV['fuyU80izGRKBueILZPsOYQ']
    set :printnode_client, PrintNode::Client.new(PrintNode::Auth.new(ENV["8c70d6f6c9dc006dcaa28cc70b22529720f37d6e"]))
    set :printer_id, ENV['278091']
  end






  get "/shipments" do
    shipments = ::EasyPost::Shipment.all({})
    erb :shipments, locals: {shipments: shipments}
  end

  get "/shipments/:shipment_id/zpl/generate" do
    shipment = ::EasyPost::Shipment.retrieve(params['shipment_id'])
    shipment.label(file_format: "ZPL") unless shipment.postage_label.label_zpl_url
    redirect back
  end

  get "/shipments/:shipment_id/zpl/print" do
    shipment = ::EasyPost::Shipment.retrieve(params['shipment_id'])
    printjob = PrintNode::PrintJob.new(settings.printer_id,
                                       shipment.id,
                                       'raw_uri',
                                       shipment.postage_label.label_zpl_url,
                                       'PrintLabel')
    settings.printnode_client.create_printjob(printjob, {})
    redirect back
  end




  # start the server if this file is executed directly
  run! if app_file == $0
end



